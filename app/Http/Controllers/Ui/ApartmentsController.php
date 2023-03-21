<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    public function index()
    {
        $apartments = Apartment::orderBy('id', 'DESC')->paginate(16);
        return view('apartments', compact('apartments'));
    }

    public function show(Apartment $apartment)
    {
        return view('ur.apartment.show', compact('apartment'));
    }
}
