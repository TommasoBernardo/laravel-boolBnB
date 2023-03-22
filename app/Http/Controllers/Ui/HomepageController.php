<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all(); 

        return view('homePage', compact('apartments'));
    }

}
