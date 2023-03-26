<?php

namespace App\Http\Controllers\UR;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

        $apartments = Apartment::where('user_id', Auth::user()->id)->get(); 

        return view('dashboard',compact('apartments'));
    }


    public function messageIndex()
    {

        $apartments = Apartment::where('user_id', Auth::user()->id)->get();

        return view('messageApartment', compact('apartments'));
    }


}
