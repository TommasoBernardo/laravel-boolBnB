<div class="container">
    <form action="{{ route($route, $apartment->id) }}" method="POST" class="mt-3" enctype="multipart/form-data">

        @csrf
        @method($methodRoute)

        <div class="mb-3">

            <label class="form-label" for="title">Inserisci il titolo</label>
            <input class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" type="text" value="{{old('title',$apartment->title)}}" name="title" id="title">
            @if($errors->has('title'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('title') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="rooms">Inserisci il numero di stanze</label>
            <input class="form-control {{$errors->has('rooms') ? 'is-invalid' : '' }}" type="number" value="{{old('rooms',$apartment->rooms)}}" name="rooms" id="rooms">
            @if($errors->has('rooms'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('rooms') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="beds">Inserisci il numero di letti</label>
            <input class="form-control {{$errors->has('beds') ? 'is-invalid' : '' }}" type="number" value="{{old('beds',$apartment->beds)}}" name="beds" id="beds">
            @if($errors->has('beds'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('beds') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="bathrooms">Inserisci il numero di bagni</label>
            <input class="form-control {{$errors->has('bathrooms') ? 'is-invalid' : '' }}" type="number" value="{{old('bathrooms',$apartment->bathrooms)}}" name="bathrooms" id="bathrooms">
            @if($errors->has('bathrooms'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('bathrooms') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="square_meters">Inserisci i metri quadri</label>
            <input class="form-control {{$errors->has('square_meters') ? 'is-invalid' : '' }}" type="number" value="{{old('square_meters',$apartment->square_meters)}}" name="square_meters" id="square_meters">
            @if($errors->has('square_meters'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('square_meters') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>

        <div class="mb-3">

            <label class="form-label" for="visible">Inserisci se già disponibile: </label>
            <label class="form-label" for="visible">si</label>
            <input class="form-check-input {{$errors->has('visible') ? 'is-invalid' : '' }}" type="radio" value="{{old('visible',$apartment->visible)}}" name="visible" id="visible">
            <label class="form-label" for="visible">no</label>
            <input class="form-check-input {{$errors->has('visible') ? 'is-invalid' : '' }}" type="radio" value="{{old('visible',$apartment->visible)}}" name="visible" id="visible">
            @if($errors->has('visible'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('visible') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>


        <div class="mb-3" id="searchBox">

            <label class="form-label" for="address">Inserisci l'indirizzo: </label>
            
        </div>


        <div class="mb-3">

            <label class="form-label" for="cover_image">Inserisci un'immagine di cover: </label>
            <input class="form-control {{$errors->has('cover_image') ? 'is-invalid' : '' }}" type="file" value="{{old('cover_image',$apartment->cover_image)}}" name="cover_image" id="cover_image">
            @if($errors->has('cover_image'))
            <div class="alert alert-danger mt-3">
                @foreach ($errors->get('cover_image') as $error)
                {{$error}}
                @endforeach
            </div>
            @endif

        </div>



        <div class="mb-3">
            <button type="submit" class="btn btn-success">{{$bottone}}</button>
        </div>
    </form>
</div>