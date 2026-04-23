@extends('landing.master')
@section('content')

<!-- START SECTION TOP -->
	<section class="section-top">
		<div class="container">
			<div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
				<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
					data-wow-offset="0">
					<h1>{{ $zone->name }}</h1>
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
						<img src="{{asset('/images/zones/' . $zone->image)}}" class="img-fluid" alt="{{ $zone->name }}">
					</div>
					<div class="property_single_details_price">
						<h1>{{ $zone->name }}</h1>
						<h4>Rp. {{ $zone->price_range }} / PAX</h4>
						<p>{{ $zone->description }}</p>
					</div>
					<div class="property_single_details_description">
						<h4>Zone Description</h4>
						<p>{{ $zone->description }}</p>
					</div>
					<div class="property_info">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="single_property_list">
									<h4>Ulasan Pengguna</h4>
									
									@if($approvedReviews && $approvedReviews->count() > 0)
										<div class="reviews-table-wrapper">
											<table class="table table-hover table-sm">
												<thead class="table-light">
													<tr>
														<th style="width: 60px;">Gambar</th>
														<th>Nama</th>
														<th style="width: 80px;">Rating</th>
														<th>Ulasan</th>
													</tr>
												</thead>
												<tbody>
													@foreach($approvedReviews as $review)
														<tr>
															<td>
																@if($review->image)
																	<img src="{{ asset('storage/' . $review->image) }}" 
																		alt="Review image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
																@else
																	<div style="width: 50px; height: 50px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 10px;">
																		<small class="text-muted">-</small>
																	</div>
																@endif
															</td>
															<td style="font-size: 13px;">
																<strong>{{ $review->reviewer_name }}</strong>
															</td>
															<td>
																<div class="rating-stars" style="font-size: 12px;">
																	@for($i = 1; $i <= 5; $i++)
																		@if($i <= $review->rating)
																			<i class="fa fa-star" style="color: #ffc107;"></i>
																		@else
																			<i class="fa fa-star-o" style="color: #ccc;"></i>
																		@endif
																	@endfor
																</div>
															</td>
															<td style="font-size: 12px;">
																<p class="mb-0">{{ Str::limit($review->description, 60) }}</p>
															</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									@else
										<p class="text-muted"><i class="fa fa-info-circle"></i> Belum ada ulasan.</p>
									@endif
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
									<Tulis Ulasan</h4>
						
						@if ($errors->any())
							<div class="alert alert-danger" style="font-size: 12px;">
								<ul class="mb-0">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						@if (session('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px;">
								{{ session('success') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" style="font-size: 10px;"></button>
							</div>
						@endif

						<form action="{{ route('landing.reviews.store') }}" method="POST" class="form" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="type" value="zone">
							<input type="hidden" name="reviewable_id" value="{{ $zone->id }}">
							
							<div class="form-group">
								<input type="text" class="form-control" name="reviewer_name" placeholder="Nama" 
									value="{{ old('reviewer_name') }}" required>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email" 
									value="{{ old('email') }}" required>
							</div>
							<div class="form-group">
								<select class="form-control" name="rating" id="rating-select" required>
									<option value="">Rating</option>
									<option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>⭐ 1 - Buruk</option>
									<option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>⭐⭐ 2 - Kurang</option>
									<option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ 3 - Cukup</option>
									<option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ 4 - Baik</option>
									<option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ 5 - Sangat Baik</option>
								</select>
							</div>
							<div class="form-group mbnone">
								<textarea rows="4" name="description" class="form-control" placeholder="Ulasan Anda" 
									required>{{ old('description') }}</textarea>
							</div>
							<div class="form-group">
								<input type="file" name="image" class="form-control" accept="image/*">
								<small class="text-muted">Maks 2MB</small>
							</div>
							<div class="actions">
								<input type="submit" value="Kirim" name="submit" class="btn btn-lg btn-contact-bg" />
							</div>
						</formnput type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
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
					
				</div><!--- END COL -->
			</div>
		</div>
	</section>
	<!-- START SINGLE PROPERTY DETAILS -->

	

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