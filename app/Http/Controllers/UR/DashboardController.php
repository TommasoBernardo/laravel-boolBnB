<?php

namespace App\Http\Controllers\UR;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $apartments = Apartment::where('user_id', Auth::user()->id)->get();

        

        $clicks = DB::table('statistics')
        ->select(DB::raw('DATE_FORMAT(date, "%Y-%m") as `year_month`, COUNT(DISTINCT ip_address) as clicks'))
        ->whereBetween('date', [Carbon::now()->subMonths(11), Carbon::now()])
        ->groupBy('year_month')
        ->get();

        // Sommiamo i click di tutti i mesi per ottenere il numero totale di click
        $total_clicks = 0;
        foreach ($clicks as $click) {
            $total_clicks += $click->clicks;
        }


        return view('dashboard',compact('apartments', 'total_clicks'));
    }


    public function messageIndex()
    {

        $apartments = Apartment::where('user_id', Auth::user()->id)->get();

        return view('messageApartment', compact('apartments'));
    }


}
