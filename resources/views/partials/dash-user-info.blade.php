@php $countMessage = 0; @endphp


@foreach ($apartments as $apartment)
    @foreach ($apartment->leads as $lead)
        @if ($lead->show != 0)
            @php $countMessage++; @endphp
        @endif
    @endforeach
@endforeach


<div class="d-flex justify-content-center">
    <div class="card border-0 mt-5 ">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="https://genslerzudansdentistry.com/wp-content/uploads/2015/11/anonymous-user.png" alt="Profile picture" class="rounded-circle" width="150">
                <div class="mt-3">
                    <h4>Hi, {{ Auth::user()->name }} {{ Auth::user()->surname }} @if (!Auth::user()->name and !Auth::user()->surname)
                            User {{ Auth::user()->id }}
                        @endif
                    </h4>
                    <p class="text-secondary mb-1">{{ Auth::user()->email }}</p>
                    <p class="text-muted font-size-sm">{{ Auth::user()->date_of_birth }}</p>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scss')
    @vite(['resources/js/dash-user.js'])
@endsection

<div class="row d-flex justify-content-evenly mt-5">
    <div class="col-lg-4 col-md-6 mb-4 my-padding">
        <div class="card results-card apartment-data shadow-md">
            <i class=" fa fa-house text-center text-white card-icon pt-4 text-shadow"></i>
            <div class="card-title text-center ">
                <h6 class="p-4 text-white text-shadow">Registered apartments:</h6>
                <p class="display-3 text-primary"><span class="count text-shadow text-white"
                        total="{{ count($apartments) }}">0</span></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4 my-padding ">
        <div class="card results-card views-data shadow-md">
            <i class="fa fa-eye text-center text-white card-icon pt-4 text-shadow"></i>
            <div class="card-title text-center ">
                <h5 class="p-4 text-white text-shadow">Total views</h5>
                <p class="display-3 text-primary"><span class="count text-shadow text-white" total="{{$total_clicks}}">0</span></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-4 my-padding ">
        <div class="card results-card messages-data shadow-md">
            <i class=" fa fa-envelope text-center text-white card-icon pt-4 text-shadow"></i>
            <div class="card-title text-center ">
                <h6 class="p-4 text-white text-shadow">Unread messages</h6>
                <p class="display-3 text-primary"><span class="count text-shadow text-white"
                        total="{{ $countMessage }}">0</span></p>
            </div>
        </div>
    </div>

</div>

@section('script')
    @vite(['resources/js/counter.js', 'resources/js/popupDelete.js'])
@endsection
