<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Messaggi da parte di utenti:</h1>
        </div>
    </div>

    @php $count = 0; @endphp


    @foreach ($apartments as $apartment)
    @foreach($apartment->leads as $lead)
    @if($lead->show != 0)
    @php $count++; @endphp
    <h1>{{ $apartment->title }}</h1>
    <div class="card text-center">
        <div class="card-header">
            {{ $lead->name }}  {{ $lead->phone_number }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $lead->email }} </h5>
            <p class="card-text">{{ $lead->message }}</p>
            <form action="{{route('dashboard.messageUpdate',$lead->id)}}" class="d-inline-block ms-3" method="POST">

                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-primary">Presa visione</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            {{$lead->created_at}}
        </div>
    </div>
    @endif
    @endforeach

    @endforeach

    @if($count == 0)
    <p class="text-center fs-1 text-danger">Nessun messaggio da visualizzare.</p>
    @endif

</div>