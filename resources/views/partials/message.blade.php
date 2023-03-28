@section('scss')
    @vite(['resources/js/message.js'])
@endsection

<div class="container">
    <div class="row" style="margin-top: 3rem; margin-bottom: 4rem ">
        <div class="col-12 text-center">
            <h1> Message from User </h1>
        </div>
    </div>
    @php $count = 0; @endphp
    @php $count++; @endphp
</div>
{{-- <div class="container-fluid">
    <div class="row m-5">
        <div class="col-lg-12 ">
            <table class="table ">
                <thead>
                    <tr class=" text-center">
                        <th>Apartment</th>
                        <th>User email</th>
                        <th>Name</th>
                        <th>Phone Number </th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        @foreach ($apartment->leads as $lead)
                            @if ($lead->show != 0)
                                <tr>
                                    <td> {{ $apartment->title }} </td>
                                    <td>{{ $lead->email }} </td>
                                    <td>{{ $lead->name }} </td>
                                    <td>{{ $lead->phone_number }} </td> 
                                    <td>{{ $lead->message }} </td>
                                    <td>
                                        <form action="{{ route('dashboard.messageUpdate', $lead->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Presa visione </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($count == 0)
        <p class="alert alert-danger ">Nessun messaggio da visualizzare.</p> -
    @endif

</div> --}}

<div class="container-fluid">
    <div class="row">
        <section class="content-area">
            <div class="table-area">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Apartment</th>
                            <th>User email</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Phone Number </th>
                            <th>Presa visione </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                            @foreach ($apartment->leads as $lead)
                                @if ($lead->show != 0)
                                    <tr>
                                        <td> {{ $apartment->title }} </td>
                                        <td>{{ $lead->email }} </td>
                                        <td>{{ $lead->name }} </td>
                                        <td class='has-details'>
                                          Hover to see message
                                          <span class="details">{{ $lead->message }}</span>
                                        </td>
                                        <td>{{ $lead->phone_number }} </td>
                                        {{-- <td>{{ $lead->message }} </td> --}}
                                        <td>
                                            <form action="{{ route('dashboard.messageUpdate', $lead->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-eye"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                 
                                        
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    @if ($count == 0)
    <p class="alert alert-danger ">Nessun messaggio da visualizzare.</p> -
    @endif
</div>
