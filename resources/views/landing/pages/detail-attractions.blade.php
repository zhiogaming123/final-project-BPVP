@extends('landing.master')
@section('content')

<!-- START SECTION TOP -->
	<section class="section-top">
		<div class="container">
			<div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
				<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
					data-wow-offset="0">
					<h1>{{ $attraction->name }}</h1>
				</div><!-- //.HERO-TEXT -->
			</div><!--- END COL -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END SECTION TOP -->

	<!-- START SINGLE PROPERTY DETAILS -->
	<section class="property_single_details section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="property_single_details_slide">
						<img src="{{asset('/images/attractions/' . $attraction->image)}}" class="img-fluid" alt="{{ $attraction->name }}">
					</div>
					<div class="property_single_details_price">
						<h1>{{ $attraction->name }}</h1>
						<h4>Rp. {{ $attraction->price_range }} / PAX</h4>
						<p>{{ $attraction->description }}</p>
					</div>
					<div class="property_single_details_description">
						<h4>Attraction Description</h4>
						<p>{{ $attraction->description }}</p>
					</div>
					<div class="property_info">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="single_property_list">
									<h4>Amenities</h4>
									<ul class="single_property_list_mr">
										<li><i class="fa fa-check"></i> Video</li>
										<li><i class="fa fa-check"></i> Hairdryer</li>
										<li><i class="fa fa-check"></i> Cot</li>
										<li><i class="fa fa-check"></i> Dishwasher</li>
										<li><i class="fa fa-check"></i> Parquet</li>
										<li><i class="fa fa-check"></i> Iron</li>
									</ul>
									<ul class="single_property_list_mr">
										<li><i class="fa fa-check"></i> Air conditioning</li>
										<li><i class="fa fa-check"></i> Cable TV</li>
										<li><i class="fa fa-check"></i> Grill</li>
										<li><i class="fa fa-check"></i> Juicer</li>
										<li><i class="fa fa-check"></i> Use of pool</li>
										<li><i class="fa fa-check"></i> Toaster</li>
									</ul>
									<ul>
										<li><i class="fa fa-check"></i> Video</li>
										<li><i class="fa fa-check"></i> Hairdryer</li>
										<li><i class="fa fa-check"></i> Cot</li>
										<li><i class="fa fa-check"></i> Dishwasher</li>
										<li><i class="fa fa-check"></i> Parquet</li>
										<li><i class="fa fa-check"></i> Iron</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="property_map">
						<h4>on map</h4>
						<div class="map-pro">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.957183635167!2d-74.00402768559431!3d40.71895904512855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2598a1316e7a7%3A0x47bb20eb6074b3f0!2sNew%20Work%20City%20-%20(CLOSED)!5e0!3m2!1sbn!2sbd!4v1600305497356!5m2!1sbn!2sbd"
								style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
					</div>
					<div class="single_similar_property">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="single_property">
									<img src="{{asset('storage/landing/assets/img/property/1.jpg')}}" class="img-fluid" alt="" />
									<div class="single_property_description text-center">
										<span><i class="fa fa-object-group"></i> 900 sq ft</span>
										<span><i class="fa fa-bed"></i> 4 Badrooms</span>
										<span><i class="fa fa-star-o"></i> 2 Baths</span>
									</div>
									<div class="single_property_content">
										<h4><a href="#">2045 B Street</a></h4>
										<p>Lorem Ipsum is not simply random text. It has roots in a piece of classical.
										</p>

									</div>
									<div class="single_property_price">
										High Meadow Lane Mount Pleasant <span>$ 170,000</span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--- END SINGLE PROPERTY -->
							</div><!--- END COL -->
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="single_property">
									<img src="{{asset('storage/landing/assets/img/property/2.jpg')}}" class="img-fluid" alt="" />
									<div class="single_property_description text-center">
										<span><i class="fa fa-object-group"></i> 900 sq ft</span>
										<span><i class="fa fa-bed"></i> 4 Badrooms</span>
										<span><i class="fa fa-star-o"></i> 2 Baths</span>
									</div>
									<div class="single_property_content">
										<h4><a href="#">Lynn Ogden Lane</a></h4>
										<p>Lorem Ipsum is not simply random text. It has roots in a piece of classical.
										</p>

									</div>
									<div class="single_property_price">
										High Meadow Lane Mount Pleasant <span>$ 170,000</span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--- END SINGLE PROPERTY -->
							</div><!--- END COL -->
						</div>
					</div>
				</div><!--- END COL -->
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="single_property_form">
						<h4>Enquire here</h4>
						<form class="form" name="enq" method="post" action="contact.php"
							onsubmit="return validation();">
							<div class="row">
								<div class="form-group col-md-12">
									<input type="text" name="name" class="form-control" id="first-name"
										placeholder="Name" required="required">
								</div>
								<div class="form-group col-md-12">
									<input type="email" name="email" class="form-control" id="email" placeholder="Email"
										required="required">
								</div>
								<div class="form-group col-md-12">
									<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
										required="required">
								</div>
								<div class="form-group col-md-12 mbnone">
									<textarea rows="6" name="message" class="form-control" id="description"
										placeholder="Your Message" required="required"></textarea>
								</div>
								<div class="col-md-12">
									<div class="actions">
										<input type="submit" value="Send message" name="submit" id="submitButton"
											class="btn btn-lg btn-contact-bg" title="Submit Your Message!" />
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="single_property_form_agent">
						<div class="single_property_form_agent_profile">
							<img src="{{asset('storage/landing/assets/img/team/team-1.jpg')}}" class="img-fluid" alt="" />
							<h4><i class="fa fa-phone"></i> +88 123 123 123</h4>
							<h4><a href="#">info@example.com</a></h4>
						</div>
						<div class="single_property_form_agent_profile">
							<img src="{{asset('storage/landing/assets/img/team/team-2.jpg')}}" class="img-fluid" alt="" />
							<h4><i class="fa fa-phone"></i> +88 123 123 123</h4>
							<h4><a href="#">info@example.com</a></h4>
						</div>
					</div>
				</div><!--- END COL -->
			</div>
		</div>
	</section>
	<!-- START SINGLE PROPERTY DETAILS -->

	<!-- START REVIEW SECTION -->
	<section class="review-section section-padding">
		<div class="container">
			<div class="row">
				<!-- FORM SUBMIT REVIEW -->
				<div class="col-md-8">
					<div class="review-form-wrapper">
						<h3 class="mb-4">Tulis Ulasan untuk {{ $attraction->name }}</h3>
						
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
							
							<!-- Hidden fields untuk attraction -->
							<input type="hidden" name="type" value="attraction">
							<input type="hidden" name="reviewable_id" value="{{ $attraction->id }}">

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
									<label for="rating" class="form-label">Rating</label>
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

				<!-- TABEL ULASAN YANG SUDAH DISETUJUI -->
				<div class="col-md-12 mt-5">
					<h3 class="mb-4">Ulasan Pengguna Lain</h3>

					@if($approvedReviews && $approvedReviews->count() > 0)
						<div class="reviews-table-wrapper">
							<table class="table table-hover">
								<thead class="table-light">
									<tr>
										<th>Gambar</th>
										<th>Nama</th>
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
							<i class="fa fa-info-circle"></i> Belum ada ulasan. Jadilah yang pertama memberikan ulasan!
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