@if (session('message'))
    <div id="popup_message" class="d-none" data-type="{{ session('alert-type') }}" data-message="{{ session('message') }}">
    </div>
@endif
<div class="text-center mt-4 ">
    <a href="{{ route('apartment.create') }}" class="btn btn-primary"> <i class=" fa-solid fa-plus fs-5 me-2"></i>Add new apartment</a>
</div>
<table class="table mt-3">
    @if (count($apartments) > 0)
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Address</th>
                <th scope="col">Visibility</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
    @endif
    <tbody class="table-group-divider">
        @foreach ($apartments as $apartment)
            <tr class="{{ $apartment->visible ? 'table-success' : 'table-danger' }}">
                <th scope="row">{{ $apartment->title }}</th>
                <td>{{ $apartment->address }}</td>
                <td>
                    @if ($apartment->visible == 1)
                        Visible
                    @else
                        Invisible
                    @endif
                </td>
                <td>
                    <a href="{{ route('apartment.show', $apartment->slug) }}" class="btn btn-primary"><i
                            class="fa-regular fa-eye" style="color: #ffffff;"></i></a>
                    <a href="{{ route('apartment.edit', $apartment->slug) }}" class="btn btn-success"><i
                            class="fa-solid fa-pencil" style="color: #ffffff;"></i></a>
                    <form action="{{ route('apartment.destroy', $apartment->slug) }}" method="post"
                        class="d-inline-block double-confirm">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa-regular fa-trash-can"
                                style="color: #ffffff;"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
