@extends('admin.master')

@section('content')
 

<h1>Create Attraction</h1>
<hr>

<form action="{{ route('admin.attractions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

   <div class="mb-3">
            <label class="form-label">Zone</label>

            <select name="zone_id"
                    class="form-control @error('zone_id') is-invalid @enderror"
                    required>

                <option value="">Select Zone</option>

                @foreach($Zones as $Zone)
                    <option value="{{ $Zone->id }}"
                        {{ old('zone_id') == $Zone->id ? 'selected' : '' }}>
                        {{ $Zone->name }}
                    </option>
                @endforeach

            </select>

            @error('Zone_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
    <div class="mb-3">
            <label>Nama</label>
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name"
                   value="{{ old('name') }}"
                   required>

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

   <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      name="description"
                      rows="3"
                      required>{{ old('description') }}</textarea>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

   <div class="mb-3">
            <label>price_range</label>
            <input type="text"
                   class="form-control @error('price_range') is-invalid @enderror"
                   name="price_range"
                   value="{{ old('price_range') }}"
                   required>

            @error('price_range')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

   <div class="mb-3">
            <label>Image</label>
           <input type="file"
       name="image"
       class="form-control @error('image') is-invalid @enderror"
                   value="{{ old('image') }}">
                   

            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    <button type="submit" class="btn btn-primary">Create Attraction</button>
</form>

@endsection

