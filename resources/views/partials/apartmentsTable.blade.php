<div class="text-center mt-4">
    <a href="{{ route('apartment.create') }}" class="btn btn-primary">Create item</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Address</th>
            <th scope="col">Visibility</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
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
                    <a href="{{ route('apartment.show', $apartment->slug) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('apartment.edit', $apartment->slug) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('apartment.destroy', $apartment->slug) }}" method="post"
                        class="d-inline-block double-confirm">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
