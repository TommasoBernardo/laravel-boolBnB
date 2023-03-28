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
use App\Models\Image;
use App\Models\Sponsor;

class ApartmentController extends Controller
{
    protected $regoleValidazione = [
        'title' => 'required|max:150|min:5|string|unique:apartments',
        'rooms' => 'required|numeric|min:1|integer|max:255',
        'beds' => 'required|numeric|min:1|integer|max:255',
        'bathrooms' => 'required|numeric|min:1|integer|max:255',
        'square_meters' => 'required|numeric|min:30|integer|max:4294967295',
        'cover_image' => 'required|image|max:10240',
        'images' => 'max:10240',
        'visible' => 'required|boolean',
        'address' => 'required|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'services' => 'required|exists:services,id|array'
    ];
    protected $messaggiValidazione = [
        'title.unique' => 'This title already exists. Choose a different one.',
        'title.required' => 'This field is mandatory',
        'title.max' => 'This field cannot have more than 150 characters.',
        'title.min' => 'This field cannot have less than 5 characters.',
        'title.string' => 'This field must be a string.',
        'rooms.required' => 'This field is mandatory.',
        'rooms.numeric' => 'This field accepts only numbers.',
        'rooms.min' => 'There must be at least one room.',
        'rooms.max' => 'You can\'t have more than 255 rooms.',
        'rooms.integer' => 'You can enter only whole numbers.',
        'beds.min' => 'There must be at least one bed',
        'beds.max' => 'You can\'t have more than 255 beds',
        'beds.integer' => 'You can enter only whole numbers.',
        'beds.required' => 'This field is mandatory.',
        'beds.numeric' => 'This field accepts only numbers.',
        'bathrooms.required' => 'This field is mandatory.',
        'bathrooms.numeric' => 'This field accepts only numbers.',
        'bathrooms.min' => 'There must be at least one bathroom',
        'bathrooms.max' => 'You can\'t have more than 255 bathrooms',
        'bathrooms.integer' => 'You can enter only whole numbers.',
        'square_meters.required' => 'This field is mandatory.',
        'square_meters.numeric' => 'This field accepts only numbers.',
        'square_meters.min' => 'A minimum of 30 square meters is required',
        'square_meters.max' => 'Exceeded maximum square meters value',
        'square_meters.integer' => 'You can enter only whole numbers, rounding up.',
        'cover_image.required' => 'This field is mandatory.',
        'cover_image.image' => 'Enter a valid image',
        'cover_image.max' => "The image exceeds maximum allowed size (2 MB)",
        'visible.required' => 'This field is mandatory.',
        'visible.boolean' => 'This field must be a boolean',
        'address.required' => 'This field is mandatory.',
        'address.string' => 'This field must be a string.',
        'latitude.required' => 'This field is mandatory.',
        'bathrooms.numeric' => 'This field accepts only numbers.',
        'longitude.required' => 'This field is mandatory.',
        'bathrooms.numeric' => 'This field accepts only numbers.',
        'services.required' => 'This field is mandatory.',
        'services.exists' => 'Selected field doesn\'t exist',
        'services.array' => 'This field must be an array',
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

        return view('ur.apartment.create', compact('apartment', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->regoleValidazione, $this->messaggiValidazione);

        $data['cover_image'] = Storage::put('img/cover_image', $data['cover_image']);

        $newApartment = new Apartment();
        $newApartment->fill($data);
        $newApartment->user_id = Auth::user()->id;
        $newApartment->slug = Str::slug($newApartment->title);
        $newApartment->save();
        $newApartment->services()->sync($data['services'] ?? []);

        if (isset($data['images'])) {
            foreach ($data['images'] as $img) {
                $newImages = new Image();
                $newImages->apartment_id = $newApartment->id;
                $newImages->path = Storage::put('img/apartment_images', $img);
                $newImages->save();
            }
        }

        return redirect()->route('apartment.show', $newApartment->slug)->with('message', "l'elemento è stato creato correttamente")->with('alert-type', 'success');
    }


    /**
     * Display the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $sponsors = Sponsor::all();
        return view('ur.apartment.show', compact('apartment', 'sponsors'));
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

        $regoleDaAggiornare['cover_image'] = ['max:10240', 'image'];
        $regoleDaAggiornare['title'] = ['required', 'max:150', 'min:5', 'string', Rule::unique('apartments')->ignore($apartment->id)];

        $data = $request->validate($regoleDaAggiornare, $this->messaggiValidazione);

        $data['slug'] = Str::slug($data['title']);


        if (isset($data['cover_image'])) {
            if (isset($apartment->cover_image)) {
                Storage::delete('img/cover_image', $apartment->cover_image);
            }
            $data['cover_image'] = Storage::put('img/cover_image', $data['cover_image']);
        }


        if (isset($data['images'])) {
            if ($apartment->images != null) {
                foreach($apartment->images as $image){
                    Storage::delete('img/apartment_images', $image->path);
                    $image->delete();
                }
            }
            foreach($data['images'] as $image){
                $newImages = new Image();
                $newImages->apartment_id = $apartment->id;
                $newImages->path = Storage::put('img/apartment_images', $image);
                $newImages->save();
            }
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
        // Elimina le immagini aggiuntive dell'appartamento
        foreach ($apartment->images as $image) {
            Storage::delete('img/apartment_images',$image->path);
            $image->delete();
        }

        // Elimina l'immagine di copertina dell'appartamento
        Storage::delete('img/cover_image' , $apartment->cover_image);

        // Elimina l'appartamento
        $apartment->delete();

        return redirect()->route('apartment.index')->with('message', "L'appartamento è stato eliminato correttamente")->with('alert-type', 'warning');
    }
}
