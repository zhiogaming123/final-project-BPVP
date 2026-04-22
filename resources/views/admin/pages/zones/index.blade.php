@extends('admin.master')

@section('content')

<h1>Zones</h1>

<a href="{{route('admin.zones.create') }}" class="btn btn-primary mb-3">Create New Zone</a>
<hr>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Price Range</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($zones as $zone)
            <tr>
                <td>{{ $zone->id }}</td>
                <td>{{ $zone->price_range }}</td>
                <td>
                    <img src="{{ asset('public/images/zones/' . $zone->image) }}" alt="{{ $zone->name }}" width="100">
                </td>
                <td>
                    <a href="{{ route('admin.zones.show', $zone) }}" class="btn btn-info">View</a>
                    <a href="{{ route('admin.zones.edit', $zone) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('admin.zones.destroy', $zone) }}" method="POST" style="display:inline-block;">
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
                <td colspan="4" class="text-center">No zones found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection


