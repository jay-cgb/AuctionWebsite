@extends('layouts.master')

@section('content')

<!-- upcoming auction css -->
<link rel="stylesheet" href="/upcomingauction/css/style.css" type="text/css">

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">High End & Top Quality</p>
								<h1>Surround Yourself With Art You Love.</h1>
								<div class="hero-btns">
									<a href="{{route('index-auction')}}" class="boxed-btn">View Auctions</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Coming Soon!</p>
								<h1>Place Preliminary Bids</h1>
								<div class="hero-btns">
									<a href="#" class="boxed-btn">Find Out More</a>
									<a href="#" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Coming Soon!</p>
								<h1>Sell With Us</h1>
								<div class="hero-btns">
									<a href="#" class="boxed-btn">Find Out More</a>
									<a href="#" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->



	<!-- Upcoming Auction Section Begin -->
	<section class="latest spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Upcoming Auctions</h2>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($auctions as $auction)
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/'.$auction->image) }} "></div>
						<div class="blog__item__text">
							<span><img src="/upcomingauction/img/icon/calendar.png" alt=""> {{ Carbon\Carbon::parse($auction->date)->format('j F, Y') }} | {{ $auction->period }} | {{ $auction->location }}</span>
							<h5>{{$auction->title}}</h5>
							<a href="{{ route('auction-items', $auction -> id) }}">Browse</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Upcoming Auction Section Ends -->


	<script src="/upcomingauction/js/main.js"></script>




@endsection
