<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Mail\SendMessage;
use App\Models\Apartment;
use App\Models\Lead;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApartmentsController extends Controller
{
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



        $apartments = Apartment::orderBy('id', 'DESC');

        $apartments->where('visible',1);



        if ($request->address) {

            $apartments = Apartment::select("*", DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance"))
                ->having("distance", "<", $maxDistance)
                ->orderBy("distance")
                ->whereBetween("latitude", [$minLat, $maxLat])
                ->whereBetween("longitude", [$minLng, $maxLng])
                ->where('visible',1);

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
        }



        $apartmentsIndex = $apartments->simplePaginate(12);
        $services = Service::all();

        return view('apartments', compact('apartmentsIndex', 'services'));
    }

    public function show(Apartment $apartment)
    {
        return view('apartmentShow', compact('apartment'));
    }

    public function store(Request $request, Apartment $apartment){

       

        $data = $request->validate([
            'name' => 'nullable|string|max:150|min:5',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
            'phone_number' => 'nullable|numeric|integer|max:9999999999|min:0111111111',
        ]);


        

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->apartment_id = $apartment->id;
        $newLead->save();

        // Mail::to('example@mail.com')->send(new SendMessage($newLead));

        return redirect()->route('apartments.show', $apartment->slug)->with('message','Messaggio inviato con successo')->with('alert-type', 'success');
    }

    public function update(Lead $lead)
    {


        $lead->update(['show' => false]);
       

        return redirect()->route('dashboard.messageIndex')->with('message', 'Elemento eliminato dalla vista')->with('alert-type', 'warning');
    }
}
