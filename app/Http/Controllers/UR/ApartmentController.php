<?php

namespace App\Http\Controllers\UR;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ApartmentController extends Controller
{
    protected $regoleValidazione = [
        'title' => 'required|max:150',
        'rooms' => 'required|numeric',
        'beds' => 'required|numeric',
        'bathrooms' => 'required|numeric',
        'square_meters' => 'required|numeric',
        'cover_image' => 'required|max:300|image',
        'visible' => 'required|boolean',
        'address' => 'required|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'services' => 'required|exists:services,id|array'
    ];
    protected $messaggiValidazione = [
        'title.required' => 'il campo è obbligatorio.',
        'title.max' => 'il campo non può contenere più di 150 caratteri.',
        'rooms.required' => 'il campo è obbligatorio.',
        'rooms.numeric' => 'il compo deve essere un numero',
        'beds.required' => 'il campo è obbligatorio.',
        'beds.numeric' => 'il compo deve essere un numero',
        'bathrooms.required' => 'il campo è obbligatorio.',
        'bathrooms.numeric' => 'il compo deve essere un numero',
        'square_meters.required' => 'il campo è obbligatorio.',
        'square_meters.numeric' => 'il compo deve essere un numero',
        'cover_image.required' => 'il campo è obbligatorio.',
        'cover_image.image' => 'inserire un immagine valida.',
        'cover_image.max' => "l'immagine inserita e troppo grande, deve pesare massimo 300kb.",
        'visible.required' => 'il campo è obbligatorio.',
        'visible.boolean' => 'il campo deve essere un booleano.',
        'address.required' => 'il campo è obbligatorio.',
        'address.string' => 'il compo deve essere una stringa',
        'latitude.required' => 'il campo è obbligatorio.',
        'bathrooms.numeric' => 'il compo deve essere un numero',
        'longitude.required' => 'il campo è obbligatorio.',
        'bathrooms.numeric' => 'il compo deve essere un numero',
        'services.required' => 'il campo è obbligatorio.',
        'services.exists' => 'il campo selezionato non esiste.',
        'services.array' => 'il campo deve essere un array',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::user()->id)->get(); 

        return view('dashboard', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $apartment = new Apartment();
        $services = Service::all();

        return view('ur.apartment.create', compact('apartment','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $data = $request->validate($this->regoleValidazione, $this->messaggiValidazione);
        

        $data['cover_image'] = Storage::put('img/cover_image', $data['cover_image']);

        $newApartment = new Apartment();
        $newApartment->fill($data);
        $newApartment->user_id = Auth::user()->id;
        $newApartment->slug = Str::slug($newApartment->title);
        $newApartment->save();
        $newApartment->services()->sync($data['services'] ?? []);

        return redirect()->route('apartment.show',$newApartment->slug)->with('message', "l'elemento è stato creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('ur.apartment.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();

        return view('ur.apartment.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {   

        
        $regoleDaAggiornare = $this->regoleValidazione;

        $regoleDaAggiornare['cover_image'] = ['max:300','image'];

        $data = $request->validate($regoleDaAggiornare, $this->messaggiValidazione);


        if (isset($data['cover_image'])) {
            if (isset($apartment->cover_image)) {
                Storage::delete('img/cover_image', $apartment->cover_image);
            }
            $data['cover_image'] = Storage::put('img/cover_image', $data['cover_image']);
        }


        $apartment->update($data);
        $apartment->services()->sync($data['services'] ?? []);

        return redirect()->route('apartment.show', $apartment->slug)->with('message', "l'elemento è stato modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
