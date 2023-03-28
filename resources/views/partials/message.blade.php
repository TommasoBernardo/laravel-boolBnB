@section('scss')
    @vite(['resources/js/message.js'])
@endsection

<div class="container-fluid">
    <div class="row" style="margin-top: 3rem; margin-bottom: 4rem ">
        <div class="col">
            <h1 class="fw-semibold"> Message from User </h1>
        </div>
    </div>
    @php $count = 0; @endphp
    @php $count++; @endphp
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-6">
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
                                    <td class="d-flex"> 
                                        <div>
                                            <button  class="btn btn-warning" id="button"  > <i class="fa-solid fa-eye"></i></button> 
                                        </div>
                                        <div class="details d-none ms-1"   id="message" > <span>{{ $lead->message }}</span> </div>
                                    </td>
                                    <td>{{ $lead->phone_number }} </td>
                                    {{-- <td>{{ $lead->message }} </td> --}}
                                    <td class="">
                                        <form action="{{ route('dashboard.messageUpdate', $lead->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-x"></i></i>
                                            </button>
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
</div>
@section('script')
    @vite(['resources/js/message.js'])
@endsection

