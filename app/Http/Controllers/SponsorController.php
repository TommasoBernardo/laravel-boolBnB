<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SponsorController extends Controller
{   


    // First payment
    public function store(Apartment $apartment, Request $request) {
       $sponsor_id = $request->input('sponsor_id');
       $end_date = Carbon::now();

        if ( $sponsor_id == 1 ) {
        $end_date->addHour(24);
        }
        if ( $sponsor_id == 2 ) {
        $end_date->addHour(72);
        }
        if ( $sponsor_id == 3 ) {
        $end_date->addHour(144);
        }

       $apartment->sponsors()->attach($sponsor_id, ['end_date' => $end_date]);

    

        return redirect()->route('apartment.show', $apartment->slug)->with('message', 'Acquisto avvenuto con successo')->with('alert-type', 'success');
    }
}
