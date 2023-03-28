@section('scss')
    @vite(['resources/js/message.js'])
@endsection

<div class="container-fluid">
    <div class="row" style="margin-top: 3rem; margin-bottom: 4rem ">
        <div class="col">
            <h1 class="fw-semibold"> Message from User </h1>
        </div>
    </div>
</div>

 @php $count = 0; @endphp 
 <div class="container-fluid">
    <div class="row">
        @if (count($apartments) > 0)
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
                                    @php $count++; @endphp
                                    <tr>
                                        <td> {{ $apartment->title }} </td>
                                        <td>{{ $lead->email }} </td>
                                        <td>{{ $lead->name }} </td>
                                        <td class="d-flex">
                                            <div>
                                                <button class="btn btn-warning" id="button"> <i class="fa-solid fa-eye"></i></button>
                                            </div>
                                            <div class="details d-none ms-1" id="message">
                                                <span>{{ $lead->message }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $lead->phone_number }} </td>

                                        <td class="">
                                            <form action="{{ route('dashboard.messageUpdate', $lead->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa-solid fa-x"></i></i>
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
        @endif
    </div>

</div> 
 {{-- @foreach ($apartments as $apartment)
    @foreach ($apartment->leads as $lead)
        @if ($lead->show != 0)
            <table class="" style="width: 100%;border:1px solid #ccc">
                <thead>
                    <tr>
                        <th colspan="4">{{ $apartment->title }} </th>
                    </tr>
                    <tr>
                        <th style="text-align: center">id</th>
                        <th style="width:5%;text-align: center">Asset Category</th>
                        <th style="width:5%;text-align: center">Days</th>
                        <th style="width:5%;text-align: center">Qty</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th style="text-align: center"><?php echo $value['id']; ?> </th>
                        <th style="width:5%;text-align: center"><?php echo $value['asset_name']; ?></th>
                        <th style="width:5%;text-align: center"><?php echo $value['days']; ?></th>
                        <th style="width:5%;text-align: center"><?php echo $value['qty']; ?></th>
                    </tr>

                </tbody>
            </table>
        @endif
    @endforeach
@endforeach  --}}


@if ($count == 0)
    <p class="alert alert-danger ">Nessun messaggio da visualizzare.</p>
@endif
</div>
@section('script')
    @vite(['resources/js/message.js'])
@endsection
