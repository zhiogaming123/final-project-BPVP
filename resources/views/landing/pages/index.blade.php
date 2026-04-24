@extends('landing.master')
@section('content')

<!-- START HOME -->
	<section id="home" class="home_bg"
    style="background-image: url('{{ asset('/storage/landing/assets/img/bg/home2-bg.jpg') }}'); 
           background-size: cover; 
           background-position: center center; 
           background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
				<div class="col-lg-10 offset-lg-1 col-sm-12 col-xs-12 text-center">
					<div class="hero-text">
						<h2>Best View In The World</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum justo vitae
							convallis varius. Nulla tristique risus ut justo pulvinar mattis.</p>
						<div class="home_btn">
					<a href="#zones" class="app-btn wow bounceIn page-scroll home_btn_color_one"
						data-wow-delay=".6s">Explore Zones</a>
					<a href="#attractions" class="app-btn wow bounceIn page-scroll home_btn_color_two"
						data-wow-delay=".8s">Explore Attractions</a>
						</div>
					</div>
				</div><!--- END COL -->
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END  HOME -->

	<!-- START SEARCH -->
	<div class="search_bar section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">Location</option>
							<option value="2">United States</option>
							<option value="3">United Kingdom</option>
							<option value="3">Afghanistan</option>
							<option value="3">Albania</option>
							<option value="3">Australia</option>
							<option value="3">Benin</option>
							<option value="3">Belgium</option>
						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">Category</option>
							<option value="1">Category</option>
							<option value="1">Category</option>
							<option value="1">Category</option>

						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">Property Type</option>
							<option value="1">Residential</option>
							<option value="1">Commercial</option>
							<option value="1">Land</option>
						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">Property Status</option>
							<option value="1">For Sale</option>
							<option value="1">For Rent</option>
						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">Price</option>
							<option value="1">$15000</option>
							<option value="1">$20000</option>
							<option value="1">$25000</option>
							<option value="1">$30000</option>
							<option value="1">$35000</option>
						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">Area</option>
							<option value="1">50</option>
							<option value="1">150</option>
							<option value="1">250</option>
							<option value="1">350</option>
							<option value="1">450</option>
						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">BedRooms</option>
							<option value="1">1</option>
							<option value="1">2</option>
							<option value="1">3</option>
							<option value="1">4</option>
							<option value="1">5</option>
							<option value="1">6</option>
							<option value="1">7</option>
						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="single_search">
						<select>
							<option value="1">Bathrooms</option>
							<option value="1">1</option>
							<option value="1">2</option>
							<option value="1">3</option>
							<option value="1">4</option>
						</select>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-12 text-center">
					<div class="search_btn">
						<a href="#" class="btn btn-serach-bg">search</a>
					</div>
				</div>
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</div>
	<!-- END  SEARCH -->

	<!-- START PROPERTY -->
	<section class="template_property" id="zones">
		<div class="container">
			<div class="section-title text-center wow zoomIn">
				<h2>Popular Zones</h2>
				<div></div>
			</div>
			<div class="row">
				@forelse ($zones as $zone)
					<div class="col-lg-4 col-sm-12 col-xs-12">
					<div class="single_property">
						<img src="{{asset('/images/zones/' . $zone->image)}} "class="img-fluid" alt="" />
						<div class="single_property_description text-center">
							<span><i class="fa fa-object-group"></i>Attraction</span>
							
						</div>
						<div class="single_property_content">
							<h4><a href="{{ route('landing.zones.show', $zone->id) }}">{{$zone->name}}</a></h4>
							<p>{{$zone->description}} </p>

						</div>
						<div class="single_property_price">
							per PAX <span>Rp. {{$zone->price_range}}</span>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
					</div><!--- END SINGLE PROPERTY -->
				</div><!--- END COL -->
				@empty
					
				@endforelse
				
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END  PROPERTY -->

	<!-- START PROPERTY -->
	<section class="template_property section-padding" id="attractions">
		<div class="container">
			<div class="section-title  text-center wow zoomIn">
				<h2>Popular Attractions</h2>
				<div></div>
			</div>
			<div class="row">

				@forelse($attractions as $attraction)
					<div class="col-lg-4 col-sm-12 col-xs-12">
						<div class="single_property">
							<img src="{{ asset('/images/attractions/' . $attraction->image) }}" class="img-fluid" alt="" />
							<div class="single_property_description text-center">
								<span><i class="fa fa-object-group"></i> </span>
								<span><i class="fa fa-bed"></i>  </span>
								<span><i class="fa fa-bath"></i> </span>
							</div>
							<div class="single_property_content">
								<h4><a href="{{ route('landing.attractions.show', $attraction->id) }}">{{ $attraction->name }}</a></h4>
								<p>{{ $attraction->description }}</p>
							</div>
							<div class="single_property_price">
								Per PAX <span>Rp. {{ $attraction->price_range }}</span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
					</div><!--- END COL -->
				@empty
					<p>No attractions available.</p>
				@endforelse
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END  PROPERTY -->

	<!-- START PORTFOLIO -->
	<section id="gallery" class="works_area">
		<div class="container">
			<div class="section-title text-center wow zoomIn">
				<h2>Gallery</h2>
				<div></div>
			</div>
			<div class="col-lg-12 text-center">
				<ul class="portfolio-filters">
					<li class="filter active" data-filter="all">all</li>
					<li class="filter" data-filter="bedroom">Bedroom</li>
					<li class="filter" data-filter="bathroom">Bathroom</li>
					<li class="filter" data-filter="kitchen">kitchen</li>
					<li class="filter" data-filter="garage">Garage</li>
					<li class="filter" data-filter="basement">Basement</li>
				</ul>
			</div><!-- END COL -->
			<div class="row portfolio-items-list">
				<div class="col-lg-4 col-sm-4 col-xs-12 mix bathroom kitchen garage">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/1.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/1.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix bedroom garage">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/2.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/2.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix bathroom">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/3.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/3.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix garage kitchen">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/4.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/4.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix bedroom">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/5.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/5.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix bathroom kitchen">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/6.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/6.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix basement garage">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/7.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/7.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix bedroom basement">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/8.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/8.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
				<div class="col-lg-4 col-sm-4 col-xs-12 mix bedroom basement">
					<div class="grid">
						<figure class="effect-apollo">
							<img src="{{asset('/storage/landing/assets/img/portfolio/9.jpg')}}"" class="img-fluid" alt="" />
							<figcaption>
								<a class="prettyPhoto image_zoom" href="{{asset('/storage/landing/assets/img/portfolio/9.jpg')}}""></a>
								<p><a href="#" data-toggle="modal" data-target="#projectModal">Your Dream House</a></p>
							</figcaption>
						</figure>
					</div>
				</div><!--- END COL -->
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END PORTFOLIO -->

	
				</div><!-- END COL-->
			</div><!-- END ROW -->
		</div><!-- END CONTAINER -->
	</section>
	<!-- END BLOG -->

@endsection