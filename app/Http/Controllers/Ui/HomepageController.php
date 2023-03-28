<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all(); 

        $dateNow = Carbon::now();

        return view('homePage', compact('apartments','dateNow'));
    }

}
