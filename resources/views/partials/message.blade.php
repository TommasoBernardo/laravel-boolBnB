<div class="container-fluid">
    <div class="row" style="margin-top: 3rem; margin-bottom: 4rem ">
        <div class="col">
            <h1 class="fw-semibold"> Message from User </h1>
        </div>
    </div>
</div>

@php $count = 0; @endphp

@foreach ($apartments as $apartment)
    @foreach ($apartment->leads as $lead)
        @if ($lead->show != 0)
            @php $count++; @endphp
        @endif
    @endforeach
@endforeach

@if ($count != 0)
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
                        @php $countMessage = 0 @endphp
                        @foreach ($apartments as $apartment)
                            @foreach ($apartment->leads as $lead)
                            @php  $countMessage++  @endphp
                                @if ($lead->show != 0)
                                    <tr>
                                        <td> {{ $apartment->title }} </td>
                                        <td>{{ $lead->email }} </td>
                                        <td>{{ $lead->name }} </td>
                                        <td class="d-flex">
                                            <div>
                                                <button class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal-{{$countMessage}}" id="button"> <i
                                                        class="fa-solid fa-eye"></i></button>
                                            </div>
                                            <div class="modal fade" id="exampleModal-{{$countMessage}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Message </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>{{ $lead->message }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="details d-none ms-1" id="message">
                            </div> --}}
                                        </td>
                                        <td>{{ $lead->phone_number }} </td>

                                        <td class="">
                                            <form action="{{ route('dashboard.messageUpdate', $lead->id) }}"
                                                class="d-inline-block" method="POST">
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
        </div>
    </div>
@else
    <p class="alert alert-danger">There are no messages</p>
@endif
</div>
@section('script')
    @vite(['resources/js/message.js', 'resources/js/popupDelete.js'])
@endsection
