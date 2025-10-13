@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
					<li class="breadcrumb-item active">About Us</li>
				</ol>
			</nav>
		</div>
	</div>

	<!-- Hero Section -->
	<div class="row mb-5">
		<div class="col-12">
			<div class="card bg-primary text-white">
				<div class="card-body py-5 text-center">
					<h1 class="display-4 fw-bold">About Our Real Estate Platform</h1>
					<p class="lead">Transforming the way people buy, sell, and rent properties</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Our Story -->
	<div class="row mb-5">
		<div class="col-lg-6">
			<h2 class="mb-4">Our Story</h2>
			<p class="lead">Founded in 2006, we've been at the forefront of real estate innovation for over 15 years.
			</p>
			<p>Our platform was born from a simple idea: make real estate transactions more transparent, efficient, and
				accessible for everyone. What started as a small startup has grown into one of the most trusted real
				estate platforms, serving millions of users across the country.</p>
			<p>We believe that everyone deserves to find their perfect home, and we're committed to making that journey
				as smooth and enjoyable as possible.</p>
		</div>
		<div class="col-lg-6">
			<img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1973&q=80"
				alt="Our Story" class="img-fluid rounded">
		</div>
	</div>

	<!-- Mission & Vision -->
	<div class="row mb-5">
		<div class="col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body text-center">
					<i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
					<h3>Our Mission</h3>
					<p>To empower people with the most comprehensive real estate data and tools, making home buying,
						selling, and renting an informed and enjoyable experience.</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body text-center">
					<i class="fas fa-eye fa-3x text-primary mb-3"></i>
					<h3>Our Vision</h3>
					<p>To create a world where everyone can find their perfect home through seamless technology and
						trusted partnerships.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Stats -->
	<div class="row mb-5">
		<div class="col-12">
			<h2 class="text-center mb-4">By The Numbers</h2>
			<div class="row text-center">
				<div class="col-md-3 col-6 mb-4">
					<div class="card bg-light">
						<div class="card-body">
							<h2 class="text-primary">50M+</h2>
							<p>Monthly Visitors</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-6 mb-4">
					<div class="card bg-light">
						<div class="card-body">
							<h2 class="text-primary">110M+</h2>
							<p>Properties Listed</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-6 mb-4">
					<div class="card bg-light">
						<div class="card-body">
							<h2 class="text-primary">500K+</h2>
							<p>Real Estate Agents</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-6 mb-4">
					<div class="card bg-light">
						<div class="card-body">
							<h2 class="text-primary">15+</h2>
							<p>Years of Excellence</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Team Section -->
	<div class="row mb-5">
		<div class="col-12">
			<h2 class="text-center mb-4">Leadership Team</h2>
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="card text-center">
						<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
							class="card-img-top" alt="CEO" style="height: 300px; object-fit: cover;">
						<div class="card-body">
							<h5 class="card-title">John Anderson</h5>
							<p class="text-muted">Chief Executive Officer</p>
							<p class="card-text">Leading our vision and strategic direction with 20+ years in real
								estate technology.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card text-center">
						<img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
							class="card-img-top" alt="CTO" style="height: 300px; object-fit: cover;">
						<div class="card-body">
							<h5 class="card-title">Sarah Johnson</h5>
							<p class="text-muted">Chief Technology Officer</p>
							<p class="card-text">Driving innovation and technical excellence across our platform.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card text-center">
						<img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
							class="card-img-top" alt="COO" style="height: 300px; object-fit: cover;">
						<div class="card-body">
							<h5 class="card-title">Michael Chen</h5>
							<p class="text-muted">Chief Operations Officer</p>
							<p class="card-text">Ensuring operational excellence and customer satisfaction.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Values -->
	<div class="row">
		<div class="col-12">
			<div class="card bg-light">
				<div class="card-body py-5">
					<h2 class="text-center mb-4">Our Values</h2>
					<div class="row text-center">
						<div class="col-md-4 mb-4">
							<i class="fas fa-shield-alt fa-2x text-primary mb-3"></i>
							<h5>Trust & Transparency</h5>
							<p>We believe in building trust through complete transparency in all our dealings.</p>
						</div>
						<div class="col-md-4 mb-4">
							<i class="fas fa-lightbulb fa-2x text-primary mb-3"></i>
							<h5>Innovation</h5>
							<p>Constantly pushing boundaries to deliver better solutions for our users.</p>
						</div>
						<div class="col-md-4 mb-4">
							<i class="fas fa-users fa-2x text-primary mb-3"></i>
							<h5>Customer First</h5>
							<p>Our customers are at the heart of everything we do and build.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection