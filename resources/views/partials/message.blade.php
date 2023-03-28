<div class="container">
    <div class="row"  style="margin-top: 3rem; margin-bottom: 4rem " >
        <div class="col-12 text-center">
            <h1> Message from User </h1>
        </div>
    </div>
    @php $count = 0; @endphp
    @php $count++; @endphp
</div>
<div class="container-fluid">
    <div class="row m-5">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th >Apartment</th>
                    <th >User email</th>
                    <th >Name</th>
                    <th >Phone Number </th>
                    <th >Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                    @foreach ($apartment->leads as $lead)
                        @if ($lead->show != 0)
                            <tr class="">
                                <th> {{ $apartment->title }} </th>
                                <td>{{ $lead->email }} </td>
                                <td>{{ $lead->name }} </td>
                                <td>{{ $lead->phone_number }} </td>
                                <td >{{ $lead->message }}</td>
                                <td > 
                                    <form action="{{route('dashboard.messageUpdate',$lead->id )}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Presa visione  </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($count == 0)
        <p class="alert alert-danger ">Nessun messaggio da visualizzare.</p> -
    @endif

</div>

