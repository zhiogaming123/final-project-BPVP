@extends('landing.master')
@section('content')

<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 text-center">
            <div class="section-top-title">
                <h1>{{ $attraction->name }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION TOP -->

<section class="property_single_details section-padding">
    <div class="container">
        <div class="row">

            <!-- KIRI: CARD attraction -->
            <div class="col-md-6 col-sm-12">
                <div class="single_property">

                    <img src="{{ asset('/images/attractions/' . $attraction->image) }}" class="img-fluid" alt="{{ $attraction->name }}" />

                    <div class="single_property_description text-center">
                        <span><i class="fa fa-tree"></i> Zona Wisata</span>
                        <span><i class="fa fa-users"></i> Per PAX</span>
                    </div>

                    <div class="single_property_content">
                        <h4>{{ $attraction->name }}</h4>
                        <p>{{ $attraction->description }}</p>
                    </div>

                    <div class="single_property_price">
                        Rp. {{ $attraction->price_range }} / PAX
                    </div>

                    <div class="p-3">
                        <h5>attraction Description</h5>
                        <p>{{ $attraction->description }}</p>

                        <hr>

                        <h5>Ulasan Pengguna</h5>

                        @if($approvedReviews && $approvedReviews->count() > 0)
                            @foreach($approvedReviews as $review)
                                <div class="mb-3">
                                    <strong>{{ $review->reviewer_name }}</strong><br>

                                    <small>
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                ⭐
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </small>

                                    <p class="mb-1">{{ $review->description }}</p>

                                    @if($review->image)
                                        <img src="{{ asset('storage/' . $review->image) }}" 
                                             style="width:70px;height:70px;object-fit:cover;border-radius:5px;">
                                    @endif

                                    <hr>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">Belum ada ulasan.</p>
                        @endif
                    </div>

                </div>
            </div>

            <!-- KANAN: FORM -->
            <div class="col-md-6 col-sm-12">
                <div class="single_property">
                    <img src="{{ asset('storage/landing/assets/img/property/2.jpg') }}" class="img-fluid" alt="" />

                    <div class="review-form-wrapper mt-3">
                        <h4>Tulis Ulasan</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('landing.reviews.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="attraction">
                            <input type="hidden" name="reviewable_id" value="{{ $attraction->id }}">

                            <div class="form-group mb-2">
                                <input type="text" name="reviewer_name" class="form-control" placeholder="Nama" required>
                            </div>

                            <div class="form-group mb-2">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="form-group mb-2">
                                <select name="rating" class="form-control" required>
                                    <option value="">Rating</option>
                                    <option value="1">⭐ 1 - Buruk</option>
                                    <option value="2">⭐⭐ 2 - Kurang</option>
                                    <option value="3">⭐⭐⭐ 3 - Cukup</option>
                                    <option value="4">⭐⭐⭐⭐ 4 - Baik</option>
                                    <option value="5">⭐⭐⭐⭐⭐ 5 - Sangat Baik</option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <textarea name="description" class="form-control" rows="4" placeholder="Ulasan Anda" required></textarea>
                            </div>

                            <div class="form-group mb-2">
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <small class="text-muted">Maks 2MB</small>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Kirim</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
.single_property {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.single_property_price {
    color: green;
    font-weight: bold;
    padding: 10px 15px;
}

.review-form-wrapper {
    padding: 20px;
}
</style>

@endsection