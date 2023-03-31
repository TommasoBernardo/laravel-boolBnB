<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Mail\SendMessage;
use App\Models\Apartment;
use App\Models\Lead;
use App\Models\Service;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApartmentsController extends Controller
{

    private function haversineDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $earthRadius = 6371; // in kilometers
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
        $lat1 = deg2rad($latitude1);
        $lat2 = deg2rad($latitude2);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos($lat1) * cos($lat2) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $distance = $earthRadius * $c;
        return $distance; // in kilometers
    }


    public function index(Request $request)
    {

        
        // $apartmentwithoutName = Apartment::where('address', 'like', '%' . $request->address . '%')->first();
        
        // if ($apartmentwithoutName) {
        //     $latitude = $apartmentwithoutName->latitude;
        //     $longitude = $apartmentwithoutName->longitude;
        // }else{

            
        // }
        
        $address = $request->input('address');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $rooms = $request->input('rooms');
        $beds = $request->input('beds');
        $services = $request->input('services');

        $earthRadius = 6371;

        if($request->distanceKm){
            $maxDistance = $request->input('distanceKm');
        }else{
            $maxDistance = 20;
        }

        $latPerKm = 0.00904371733; // (1 km = 0.00904371733 latitudine)
        $lngPerKm = 0.0109664041; // (1 km = 0.0109664041 longitudine)

        // Calcolo delle coordinate geografiche dei limiti del raggio di ricerca
        $minLat = $latitude - ($maxDistance / $earthRadius) * (180 / pi());
        $maxLat = $latitude + ($maxDistance / $earthRadius) * (180 / pi());
        $minLng = $longitude - ($maxDistance / $earthRadius) * (180 / pi() / cos($latitude * pi() / 180));
        $maxLng = $longitude + ($maxDistance / $earthRadius) * (180 / pi() / cos($latitude * pi() / 180));


        $current_date = Carbon::now();

        $latest_sponsorship = DB::table('apartment_sponsor')
        ->select('apartment_id', DB::raw('MAX(end_date) AS end_date'))
        ->where(function ($query) use ($current_date) {
            $query->whereNull('end_date')
                ->orWhere('end_date', '>', $current_date);
        })
        ->groupBy('apartment_id');

        $apartments = Apartment::leftJoinSub($latest_sponsorship,
            'latest_sponsorship',
            function ($join) {
                $join->on('apartments.id', '=', 'latest_sponsorship.apartment_id');
            }
        )
        ->leftJoin('apartment_sponsor', function ($join) {
            $join->on('apartments.id', '=', 'apartment_sponsor.apartment_id')
                ->whereColumn('apartment_sponsor.apartment_id', '=', 'latest_sponsorship.apartment_id')
                ->whereColumn('apartment_sponsor.end_date', '=', 'latest_sponsorship.end_date');
        })
        ->select('apartments.*', 'apartment_sponsor.end_date')
        ->where('visible', 1)
            ->orderByRaw('CASE WHEN apartment_sponsor.end_date IS NULL OR apartment_sponsor.end_date > ? THEN 0 ELSE 1 END', [$current_date])
            ->orderByRaw('COALESCE(apartment_sponsor.end_date, \'9999-12-31\') ASC')
            ->orderBy('apartments.id', 'desc')
            ->distinct();




        if ($request->address) {
            $current_date = Carbon::now();

            $subquery = DB::table('apartment_sponsor')
                ->select('apartment_id', DB::raw('MAX(end_date) as last_sponsor_end_date'))
                ->where(function ($query) use ($current_date) {
                    $query->whereNull('end_date')
                        ->orWhere('end_date', '>', $current_date);
                })
                ->groupBy('apartment_id');

            $apartments = Apartment::select(
                    "apartments.*",
                    DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance"),
                    DB::raw("COALESCE(apartment_sponsor.end_date, NULL) as sponsor_end_date")
                )
                ->leftJoin(DB::raw("({$subquery->toSql()}) as last_sponsors"), function ($join) {
                    $join->on('apartments.id', '=', 'last_sponsors.apartment_id');
                })
                ->addBinding($subquery->getBindings(), 'join')
                ->leftJoin('apartment_sponsor', function ($join) use ($current_date) {
                    $join->on('apartments.id', '=', 'apartment_sponsor.apartment_id')
                    ->where(function ($query) use ($current_date) {
                        $query->whereNull('apartment_sponsor.end_date')
                        ->orWhere('apartment_sponsor.end_date', '>', $current_date);
                    });
                })
                ->where('visible', 1)
                ->whereBetween("latitude", [$minLat, $maxLat])
                ->whereBetween("longitude", [$minLng, $maxLng])
                ->whereRaw('(last_sponsors.last_sponsor_end_date IS NULL OR apartment_sponsor.end_date = last_sponsors.last_sponsor_end_date)')
                ->orderByRaw('CASE WHEN sponsor_end_date IS NULL OR sponsor_end_date > ? THEN 0 ELSE 1 END', [$current_date])
                ->orderByRaw('COALESCE(sponsor_end_date, \'9999-12-31\') ASC')
                ->orderBy('distance')
                ->distinct();



        


            if ($request->rooms) {
                $apartments->where('rooms', '>=', $rooms);
            }
            if ($request->beds) {
                $apartments->where('beds', '>=', $beds);
            }
            if ($request->services) {
                $apartments->whereHas('services', function ($query) use ($services) {
                    $query->whereIn('service_id', $services);
                }, '=', count($services));
            }
            $apartments = $apartments->simplePaginate(12);
            
            foreach ($apartments as $apartment) {
                $distance = $this->haversineDistance($latitude, $longitude, $apartment->latitude, $apartment->longitude);
                $apartment->distance = round($distance, 2);
            }
        }else{
            $apartments = $apartments->simplePaginate(12);
        }

        

        
        $services = Service::all();

        $dateNow = Carbon::now(); 
        
        return view('apartments', compact('apartments', 'services','dateNow'));
    }

    public function show(Apartment $apartment,Request $request)
    {


        // $newStatistic = new Statistic();
        // $newStatistic->apartment_id = $apartment->id;
        // $newStatistic->ip_address = $request->ip();
        // $newStatistic->date = Carbon::now();
        // $newStatistic->save();



        return view('apartmentShow', compact('apartment'));
    }

    public function store(Request $request, Apartment $apartment){

       

        $data = $request->validate([
            'name' => 'nullable|string|max:150|min:3',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
            'phone_number' => 'nullable|numeric|integer|max:9999999999|min:0111111111',
        ]);


        

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->apartment_id = $apartment->id;
        $newLead->save();

        // Mail::to('example@mail.com')->send(new SendMessage($newLead));

        return redirect()->route('apartments.show', $apartment->slug)->with('message','Messagge sent successfully')->with('alert-type', 'success');
    }

    public function update(Lead $lead)
    {


        $lead->update(['show' => false]);
       

        return redirect()->route('dashboard.messageIndex')->with('message', 'Message removed from view')->with('alert-type', 'warning');
    }
}
