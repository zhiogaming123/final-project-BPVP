@extends('admin.master')

@section('content')

<h1>attractions</h1>

<a href="{{route('admin.attractions.create') }}" class="btn btn-primary mb-3">Create New attraction</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Zone</th>
            <th>Description</th>
            <th>Price Range</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($attractions as $attraction)
            <tr>
                <td>{{ $attraction->id }}</td>
                <td>{{ $attraction->name }}</td>
                <td>{{ $attraction->zone->name }}</td>
                <td>{{ $attraction->description }}</td>
                <td>{{ $attraction->price_range }}</td>
                <td>
                    <img src="{{ asset('images/attractions/' . $attraction->image) }}" width="100">
                </td>
                <td>
                    <a href="{{ route('admin.attractions.show', $attraction) }}" class="btn btn-info">View</a>
                    <a href="{{ route('admin.attractions.edit', $attraction) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('admin.attractions.destroy', $attraction) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No attractions found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection


