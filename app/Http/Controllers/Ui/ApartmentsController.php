<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentsController extends Controller
{
    public function index(Request $request)
    {

        
        $address = $request->input('address');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $rooms = $request->input('rooms');
        $beds = $request->input('beds');
        $services = $request->input('services');

        $earthRadius = 6371;
        $maxDistance = $request->input('distanceKm'); 

        $latPerKm = 0.00904371733; // (1 km = 0.00904371733 latitudine)
        $lngPerKm = 0.0109664041; // (1 km = 0.0109664041 longitudine)

        // Calcolo delle coordinate geografiche dei limiti del raggio di ricerca
        $minLat = $latitude - ($maxDistance / $earthRadius) * (180 / pi());
        $maxLat = $latitude + ($maxDistance / $earthRadius) * (180 / pi());
        $minLng = $longitude - ($maxDistance / $earthRadius) * (180 / pi() / cos($latitude * pi() / 180));
        $maxLng = $longitude + ($maxDistance / $earthRadius) * (180 / pi() / cos($latitude * pi() / 180));



        $apartments = Apartment::orderBy('id','DESC');

        


        if ($request->address) {

            $apartments = Apartment::select("*", DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance"))
                ->having("distance", "<", $maxDistance)
                ->orderBy("distance")
                ->whereBetween("latitude", [$minLat, $maxLat])
                ->whereBetween("longitude", [$minLng, $maxLng]);

            if ($request->rooms) {
                $apartments->where('rooms', '>=', $rooms);
            }
            if ($request->beds) {
                $apartments->where('beds', '>=', $beds);
            }
            if($request->services){
                $apartments->whereHas('services', function ($query) use ($services) {
                    $query->whereIn('service_id', $services);
                }, '=', count($services));
            }
        } 



        $apartmentsIndex = $apartments->paginate(16);
        $services = Service::all();
        
        return view('apartments', compact('apartmentsIndex','services'));
    }

    public function show(Apartment $apartment)
    {
        return view('apartmentShow', compact('apartment'));
    }



}
