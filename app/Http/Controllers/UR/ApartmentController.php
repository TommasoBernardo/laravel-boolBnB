<?php

namespace App\Http\Controllers\UR;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;



class ApartmentController extends Controller
{
    protected $regoleValidazione = [
        'title' => 'required|max:150|min:5|string|unique:apartments',
        'rooms' => 'required|numeric|min:1|integer|max:255',
        'beds' => 'required|numeric|min:1|integer|max:255',
        'bathrooms' => 'required|numeric|min:1|integer|max:255',
        'square_meters' => 'required|numeric|min:30|integer|max:4294967295',
        'cover_image' => 'required|max:1024|image',
        'visible' => 'required|boolean',
        'address' => 'required|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'services' => 'required|exists:services,id|array'
    ];
    protected $messaggiValidazione = [
        'title.unique' => 'questo titolo esiste già, sceglierne un altro.',
        'title.required' => 'il campo è obbligatorio.',
        'title.max' => 'il campo non può contenere più di 150 caratteri.',
        'title.min' => 'il campo non può contenere meno di 5 caratteri.',
        'title.string' => 'il campo deve essere una stringa',
        'rooms.required' => 'il campo è obbligatorio.',
        'rooms.numeric' => 'il campo deve essere un numero',
        'rooms.min' => 'Deve avere almeno una stanza',
        'rooms.max' => 'Non puo avere piu di 255 stanze',
        'rooms.integer' => 'Si accettano solo numeri interi',
        'beds.min' => 'Deve avere almeno un posto letto',
        'beds.max' => 'Non puo avere piu di 255 letti',
        'beds.integer' => 'Si accettano solo numeri interi',
        'beds.required' => 'il campo è obbligatorio.',
        'beds.numeric' => 'il campo deve essere un numero',
        'bathrooms.required' => 'il campo è obbligatorio.',
        'bathrooms.numeric' => 'il compo deve essere un numero',
        'bathrooms.min' => 'Deve avere almeno un bagno',
        'bathrooms.max' => 'Non puo avere piu di 255 bagni',
        'bathrooms.integer' => 'Si accettano solo numeri interi',
        'square_meters.required' => 'il campo è obbligatorio.',
        'square_meters.numeric' => 'il campo deve essere un numero',
        'square_meters.min' => 'Minimo 30 metri quadri',
        'square_meters.max' => 'Superato liminite massimo di metri quadri',
        'square_meters.integer' => 'Si accetano solo numeri interi, si arrotonta per eccesso',
        'cover_image.required' => 'il campo è obbligatorio.',
        'cover_image.image' => 'inserire un immagine valida.',
        'cover_image.max' => "l'immagine inserita è troppo grande, deve pesare massimo 1024Kb.",
        'visible.required' => 'il campo è obbligatorio.',
        'visible.boolean' => 'il campo deve essere un booleano.',
        'address.required' => 'il campo è obbligatorio.',
        'address.string' => 'il campo deve essere una stringa',
        'latitude.required' => 'il campo è obbligatorio.',
        'bathrooms.numeric' => 'il campo deve essere un numero',
        'longitude.required' => 'il campo è obbligatorio.',
        'bathrooms.numeric' => 'il campo deve essere un numero',
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

        return view('list-apartment', compact('apartments'));
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

        return redirect()->route('apartment.show',$newApartment->slug)->with('message', "$newApartment->title has been created")->with('alert-type', 'info');
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
        $regoleDaAggiornare['title'] = ['required','max:150','min:5','string', Rule::unique('apartments')->ignore($apartment->id)];

        $data = $request->validate($regoleDaAggiornare, $this->messaggiValidazione);

        $data['slug'] = Str::slug($data['title']);
        

        if (isset($data['cover_image'])) {
            if (isset($apartment->cover_image)) {
                Storage::delete('img/cover_image', $apartment->cover_image);
            }
            $data['cover_image'] = Storage::put('img/cover_image', $data['cover_image']);
        }


        $apartment->update($data);
        $apartment->services()->sync($data['services'] ?? []);

        return redirect()->route('apartment.show', $apartment->slug)->with('message', 'Elemento modificato con successo')->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        Storage::delete('img/cover_image', $apartment->cover_image);

        return redirect()->route('apartment.index')->with('message', "The apartment $apartment->title has been removed")->with('alert-type', 'warning');
    }
}
