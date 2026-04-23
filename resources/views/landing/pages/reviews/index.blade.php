@extends('landing.master')
@section('content')

<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
            <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
                data-wow-offset="0">
                <h1>Ulasan & Rating</h1>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION TOP -->

<!-- START REVIEW SECTION -->
<section class="review-section section-padding">
    <div class="container">
        <div class="row">
            <!-- FORM SUBMIT REVIEW -->
            <div class="col-md-12">
                <div class="review-form-wrapper">
                    <h3 class="mb-4">Tulis Ulasan Anda</h3>
                    
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
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('landing.reviews.store') }}" method="POST" class="review-form" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="reviewer_name" class="form-label">Nama Anda</label>
                                <input type="text" class="form-control @error('reviewer_name') is-invalid @enderror" 
                                    id="reviewer_name" name="reviewer_name" placeholder="Masukkan nama Anda" 
                                    value="{{ old('reviewer_name') }}" required>
                                @error('reviewer_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" placeholder="Masukkan email Anda" 
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="type" class="form-label">Tipe Ulasan</label>
                                <select class="form-control @error('type') is-invalid @enderror" 
                                    id="type" name="type" onchange="loadItems()" required>
                                    <option value="">-- Pilih Tipe --</option>
                                    <option value="attraction" {{ old('type') == 'attraction' ? 'selected' : '' }}>Destinasi Wisata</option>
                                    <option value="zone" {{ old('type') == 'zone' ? 'selected' : '' }}>Zona</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="reviewable_id" class="form-label">Pilih Item</label>
                                <select class="form-control @error('reviewable_id') is-invalid @enderror" 
                                    id="reviewable_id" name="reviewable_id" required>
                                    <option value="">-- Pilih Item --</option>
                                    @foreach($attractions as $attraction)
                                        <option value="{{ $attraction->id }}" data-type="attraction" 
                                            {{ old('reviewable_id') == $attraction->id ? 'selected' : '' }}>
                                            {{ $attraction->name }}
                                        </option>
                                    @endforeach
                                    @foreach($zones as $zone)
                                        <option value="{{ $zone->id }}" data-type="zone" 
                                            {{ old('reviewable_id') == $zone->id ? 'selected' : '' }}>
                                            {{ $zone->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('reviewable_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <div class="rating-input">
                                    <select class="form-control @error('rating') is-invalid @enderror" 
                                        id="rating" name="rating" required>
                                        <option value="">-- Pilih Rating --</option>
                                        <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>⭐ 1 - Sangat Buruk</option>
                                        <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>⭐⭐ 2 - Buruk</option>
                                        <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ 3 - Cukup</option>
                                        <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ 4 - Bagus</option>
                                        <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ 5 - Sempurna</option>
                                    </select>
                                    @error('rating')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="rating" class="form-label">&nbsp;</label>
                                <div id="rating-display" class="mt-2">
                                    <span id="rating-stars"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Ulasan</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" rows="5" 
                                placeholder="Tulis pengalaman dan ulasan Anda di sini..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar (Opsional)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                id="image" name="image" accept="image/*">
                            <small class="form-text text-muted">Max. 2MB (JPEG, PNG, JPG, GIF)</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Kirim Ulasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <!-- TABEL ULASAN YANG SUDAH DISETUJUI -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-4">Ulasan dari Pengguna ({{ $approvedReviews->count() }})</h3>

                @if($approvedReviews->count() > 0)
                    <div class="reviews-table-wrapper">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Item</th>
                                    <th>Rating</th>
                                    <th>Ulasan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($approvedReviews as $review)
                                    <tr>
                                        <td>
                                            @if($review->image)
                                                <img src="{{ asset('storage/' . $review->image) }}" 
                                                    alt="Review image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <div style="width: 60px; height: 60px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                                    <small class="text-muted">No image</small>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $review->reviewer_name }}</strong>
                                        </td>
                                        <td>{{ $review->email ?? '-' }}</td>
                                        <td>
                                            @if($review->reviewable)
                                                <span class="badge bg-info">{{ $review->reviewable->name }}</span>
                                            @else
                                                <span class="badge bg-secondary">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="rating-stars">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                        <i class="fa fa-star" style="color: #ffc107;"></i>
                                                    @else
                                                        <i class="fa fa-star-o" style="color: #ccc;"></i>
                                                    @endif
                                                @endfor
                                                <span class="ms-2">({{ $review->rating }}/5)</span>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ Str::limit($review->description, 100) }}</p>
                                        </td>
                                        <td>
                                            <small>{{ $review->created_at->format('d M Y') }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> Belum ada ulasan yang disetujui. Jadilah yang pertama memberikan ulasan!
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- END REVIEW SECTION -->

<style>
    .review-form-wrapper {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .review-form .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .review-form .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 0.75rem;
    }

    .review-form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .reviews-table-wrapper {
        overflow-x: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .table {
        margin-bottom: 0;
    }

    .rating-stars {
        white-space: nowrap;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: 4px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<script>
    function loadItems() {
        const type = document.getElementById('type').value;
        const itemSelect = document.getElementById('reviewable_id');
        const oldValue = itemSelect.value;

        // Clear options
        itemSelect.innerHTML = '<option value="">-- Pilih Item --</option>';

        // Add filtered options
        @if(count($attractions) > 0)
            @foreach($attractions as $attraction)
                if ('{{ "attraction" }}' === type) {
                    const option = document.createElement('option');
                    option.value = '{{ $attraction->id }}';
                    option.text = '{{ $attraction->name }}';
                    itemSelect.appendChild(option);
                }
            @endforeach
        @endif

        @if(count($zones) > 0)
            @foreach($zones as $zone)
                if ('{{ "zone" }}' === type) {
                    const option = document.createElement('option');
                    option.value = '{{ $zone->id }}';
                    option.text = '{{ $zone->name }}';
                    itemSelect.appendChild(option);
                }
            @endforeach
        @endif
    }

    // Update rating display
    document.getElementById('rating').addEventListener('change', function() {
        const rating = this.value;
        const starsHtml = generateStars(rating);
        document.getElementById('rating-stars').innerHTML = starsHtml;
    });

    function generateStars(rating) {
        let html = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= rating) {
                html += '<i class="fa fa-star" style="color: #ffc107; font-size: 1.5rem;"></i>';
            } else {
                html += '<i class="fa fa-star-o" style="color: #ccc; font-size: 1.5rem;"></i>';
            }
        }
        return html;
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        const rating = document.getElementById('rating').value;
        if (rating) {
            const starsHtml = generateStars(rating);
            document.getElementById('rating-stars').innerHTML = starsHtml;
        }
    });
</script>

@endsection
