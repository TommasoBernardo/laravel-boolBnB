<div class="container">
    <form action="{{ route($route, $apartment->slug) }}" method="POST" id="formCrud" class="mt-3"
        enctype="multipart/form-data">
        @csrf
        @method($methodRoute)

        <div class="mb-3">
            <label class="form-label" for="title">Inserisci il titolo*</label>
            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                value="{{ old('title', $apartment->title) }}" name="title" id="title" required maxlength="150"
                minlength="5">
            @if ($errors->has('title'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('title') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="rooms">Inserisci il numero di stanze*</label>
            <input class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}" type="number"
                value="{{ old('rooms', $apartment->rooms) }}" name="rooms" id="rooms" required min="1"
                max="255">
            @if ($errors->has('rooms'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('rooms') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="beds">Inserisci il numero di letti*</label>
            <input class="form-control {{ $errors->has('beds') ? 'is-invalid' : '' }}" type="number"
                value="{{ old('beds', $apartment->beds) }}" name="beds" id="beds" required min="1"
                max="255">
            @if ($errors->has('beds'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('beds') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="bathrooms">Inserisci il numero di bagni*</label>
            <input class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" type="number"
                value="{{ old('bathrooms', $apartment->bathrooms) }}" name="bathrooms" id="bathrooms" required
                min="1" max="255">
            @if ($errors->has('bathrooms'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('bathrooms') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="square_meters">Inserisci i metri quadri*</label>
            <input class="form-control {{ $errors->has('square_meters') ? 'is-invalid' : '' }}" type="number"
                value="{{ old('square_meters', $apartment->square_meters) }}" name="square_meters" id="square_meters"
                required min="30" max="4294967295">
            @if ($errors->has('square_meters'))
                <div class=" alert alert-danger mt-3">
                    @foreach ($errors->get('square_meters') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="visible">Inserisci se già disponibile*: </label>
            <label class="form-label" for="visible">si</label>
            <input class="form-check-input {{ $errors->has('visible') ? 'is-invalid' : '' }}" type="radio"
                value="1" name="visible" id="visible"
                @if (isset($apartment->visible) || old('visible') != null) @if (old('visible', $apartment->visible) == 1) checked @endif @endif required>
            <label class="form-label" for="visible">no</label>
            <input class="form-check-input {{ $errors->has('visible') ? 'is-invalid' : '' }}" type="radio"
                value="0" name="visible" id="visible"
                @if (isset($apartment->visible) || old('visible') != null) @if (old('visible', $apartment->visible) == 0) checked @endif @endif required >
            @if ($errors->has('visible'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('visible') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="address">Inserisci l'indirizzo*: </label>
            <div id="searchBox"></div>
            <p id="mexErrore" class="text-center text-danger fs-1 m-0 d-none">Selezionare una via dal menu a tendina</p>
            @if ($errors->has('address'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('address') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <div class="d-none mt-3">
                <label class="form-label" for="latitude">latitudine: </label>
                <input class="" id="latitude" type="text" name="latitude"
                    value="{{ old('latitude', $apartment->latitude) }}">
                <label class="form-label" for="longitude">longitudine: </label>
                <input class="" id="longitude" type="text" name="longitude"
                    value="{{ old('longitude', $apartment->longitude) }}">
                <label class="form-label" for="address">indirizzo: </label>
                <input class="" id="address" type="text" name="address"
                    value="{{ old('address', $apartment->address) }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="cover_image">Inserisci un'immagine di cover*: </label>
            <input class="form-control {{ $errors->has('cover_image') ? 'is-invalid' : '' }}" type="file"
                value="{{ old('cover_image', $apartment->cover_image) }}" name="cover_image" id="cover_image">
            @if ($errors->has('cover_image'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('cover_image') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="images">Inserisci altre immagini: </label>
            <input class="form-control {{ $errors->has('images.*') ? 'is-invalid' : '' }}" type="file"
                name="images[]" id="images" multiple>

            @if ($errors->has('images.*'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <p for="">Seleziona i servizi del tuo appartamento*:</p>
            @foreach ($services as $service)
                <input type="checkbox" class="form-check-input {{ $errors->has('services') ? 'is-invalid' : '' }} "
                    name="services[]" value="{{ $service->id }}"
                    @if ($errors->any()) @checked(in_array($service->id,old('services',[])))
            @else
            @checked($apartment->services->contains($service->id)) @endif>

                <label class="form-check-label"> {{ $service->type }} </label>
            @endforeach
            <span class="invalid-feedback" id="errorMex" role="alert">
                <strong> Selezionare almeno un servizio </strong>
            </span>
            @if ($errors->has('services'))
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->get('services') as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">{{ $bottone }}</button>
        </div>
    </form>
</div>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col d-flex justify-content-center">
            <div class="wrapper-return-index">
                <a href="{{ route('apartment.index') }}" class="btn fw-bold"
                    style="background-color: #005555; color:white; padding: .8rem 2rem; font-size: 1.1rem ">Back</a>
            </div>
        </div>
    </div>
</div>
