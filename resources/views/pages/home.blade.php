@extends('layouts.app')
@section('name')
    Your Travel
@endsection
@section('content')
    <!-- Header -->
	<header class="text-center">
		<h1>
			Explore The Beutiful World
			</br>
			As easy on click
		</h1>
		<p>
			You will see beutiful
			</br>
			Moment never see you before
		</p>
		<a href="#popularContent" class="btn btn-get-started px-4 mt-4">
			Get Started
		</a>
		
	</header>

	<main>
		<div class="container">
			<section class="section-stats row justify-content-center" id="stats">
				<div class="col-6 col-md-2 stats-detail">
					<h2>
						20K
					</h2>
					<p>
						Members
					</p>
				</div>
				<div class="col-6 col-md-2 stats-detail">
					<h2>
						12
					</h2>
					<p>
						Countries
					</p>
				</div>
				<div class="col-6 col-md-2 stats-detail">
					<h2>
						3K
					</h2>
					<p>
						Hotel
					</p>
				</div>
				<div class="col-6 col-md-2 stats-detail">
					<h2>
						72
					</h2>
					<p>
						Partner
					</p>
				</div>
			</section>
		</div>
		<section class="section-popular" id="popular">
			<div class="container">
				<div class="row">
					<div class="col text-center section-heading-popular">
						<h2>
							Wisata Popular
						</h2>
						<p>
							Something that you never try
							</br>
							before in this world
						</p>
					</div>
				</div>
			</div>
		</section>
		<section class="section-popular-content" id="popularContent">
			<div class="container">
				<div class="section-popular-travel row justify-content-center">
					@foreach ($items as $item)
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="card-travel text-center d-flex flex-column" style="background-image: url('{{$item->galleries->count()?Storage::url($item->galleries->first()->image):''}}');">
							<div class="travel-country">{{$item->location}}</div>
							<div class="travel-location">
								{{$item->title}}
							</div>
							<div class="travel-button mt-auto">
								<a href="{{route('detail',$item->slug)}}" class="btn btn-travel-detail px-4">
									Views Detail
								</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<section class="section-networks">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h2>
							Our Networks
						</h2>
						<p>
							Companies are trusted us
							</br>
							More than just a trip
						</p>
					</div>
					<div class="col-md-8 text-center">
						<img src="{{url('frontend/images/partner.png')}}" alt="Logo Partner" class="img-partner">
					</div>
				</div>
			</div>
		</section>
		<section class="section-testimonial-heading" id="testimonialHeading">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h2>
							They Are Loving Us
						</h2>
						<p>
							Moments were giving there
							</br>
							the best experience
						</p>
					</div>
				</div>
			</div>
		</section>
		<section class="section-testimonial-content" id="testimonialContent">
			<div class="container">
				<div class="section-popular-travel row justify-content-center">
					<div class="col-sm-6 col-md-4 col-lg-4">
						<div class="card card-testimonial text-center">
							<div class="testimonial-content">
								<img src="frontend/images/avatar-1.png" alt="user" class="mb-4 rounded-circle">
								<h3 class="mb-4">Angga Risky</h3>
								<p class="testimonial">
									"It was glorius stop say wohoo for every single moment dankee"
								</p>
							</div>
							<hr>
							<p class="trip-to mt-2">
								Trip to ubud
							</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<div class="card card-testimonial text-center">
							<div class="testimonial-content">
								<img src="frontend/images/avatar-2.png" alt="user" class="mb-4 rounded-circle">
								<h3 class="mb-4">Shayna</h3>
								<p class="testimonial">
									"It was glorius stop say wohoo for every single moment dankee"
								</p>
							</div>
							<hr>
							<p class="trip-to mt-2">
								Trip to ubNusa penida
							</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<div class="card card-testimonial text-center">
							<div class="testimonial-content">
								<img src="frontend/images/avatar-3.png" alt="user" class="mb-4 rounded-circle">
								<h3 class="mb-4">Shabrina</h3>
								<p class="testimonial">
									"It was glorius stop say wohoo for every single moment dankee"
								</p>
							</div>
							<hr>
							<p class="trip-to mt-2">
								Trip to ubud
							</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12 text-center">
						<a class="btn btn-need-help px-4 mt-4 mx-1">
							I Need Help
						</a>
						<a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
							Get Started
						</a>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection