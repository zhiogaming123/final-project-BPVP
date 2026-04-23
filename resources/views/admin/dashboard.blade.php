@extends('master')

@section('content')
<div class="container mt-4">

    <div class="row">
        <div class="col-12">
            <div class="p-4 bg-white shadow rounded">
                <h3 class="mb-2">📊 Admin Dashboard</h3>
                <p class="text-muted">Selamat datang di panel admin.</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="p-3 bg-primary text-white rounded">
                <h5>Zones</h5>
                <h3>0</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 bg-success text-white rounded">
                <h5>Attractions</h5>
                <h3>0</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 bg-warning text-white rounded">
                <h5>Reviews</h5>
                <h3>0</h3>
            </div>
        </div>

    </div>

</div>
@endsection