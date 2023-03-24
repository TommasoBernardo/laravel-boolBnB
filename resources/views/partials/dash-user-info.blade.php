
<div class="d-flex justify-content-center">
    <div class="card border-0 mt-5 ">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="https://i.pravatar.cc/300" alt="Profile picture" class="rounded-circle" width="150">
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


<div class="row d-flex justify-content-between">
    <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-end align-items-stretch">
        <div class="card shadow-sm" style="width: 18rem;">
            <div class="card-title text-center ">
                <h5 class="p-4">Registered apartments</h5>
                <p class="display-3 text-primary"><span class="count" total="{{ count($apartments) }}">0</span></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center  align-items-stretch">
        <div class="card shadow-sm" style="width: 18rem;">
            <div class="card-title text-center ">
                <h5 class="p-4">Total views</h5>
                <p class="display-3 text-primary"><span class="count" total="50">0</span></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-4 d-flex justify-content-start align-items-stretch">
        <div class="card shadow-sm" style="width: 18rem;">
            <div class="card-title text-center ">
                <h5 class="p-4">Something</h5>
                <p class="display-3 text-primary"><span class="count" total="754">0</span></p>
            </div>
        </div>
    </div>
</div>

@section('script')
    @vite(['resources/js/counter.js','resources/js/popupDelete.js'])
@endsection
