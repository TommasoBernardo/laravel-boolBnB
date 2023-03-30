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


        $total_clicks = 0;

        foreach ($apartments as $apartment) {
            $clicks = DB::table('statistics')
            ->select(DB::raw('COUNT(DISTINCT ip_address) as clicks'))
            ->where('apartment_id', $apartment->id)
            ->whereBetween('date', [Carbon::now()->subMonths(11)->startOfMonth(), Carbon::now()->endOfMonth()])
            ->first();
            $total_clicks += $clicks->clicks;
        }

       


        return view('dashboard',compact('apartments', 'total_clicks'));
    }


    public function messageIndex()
    {

        $apartments = Apartment::where('user_id', Auth::user()->id)->get();

        return view('messageApartment', compact('apartments'));
    }


}
