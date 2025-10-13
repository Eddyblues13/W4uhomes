@extends('layouts.app')

@section('title', 'Buy Properties')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Buy Properties</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="section-title">Homes for Sale</h1>
            <p class="section-subtitle">Find your dream home from our extensive collection of properties for sale</p>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-5">
        <div class="col-md-3 col-6 text-center">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3>1,250+</h3>
                    <p>Properties Available</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 text-center">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h3>$450K</h3>
                    <p>Average Price</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 text-center">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h3>45</h3>
                    <p>Days on Market</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 text-center">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h3>98%</h3>
                    <p>Satisfied Clients</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Properties for Sale -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-4">Featured Properties for Sale</h2>
        </div>
        @foreach($properties as $property)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card property-card-custom h-100">
                <div class="position-relative">
                    <img src="{{ $property->image ?? 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80' }}"
                        class="card-img-top" alt="{{ $property->title }}" style="height: 250px; object-fit: cover;">
                    <span class="position-absolute top-0 start-0 bg-primary text-white px-3 py-1 m-2 rounded">
                        For Sale
                    </span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $property->title }}</h5>
                    <p class="card-text text-muted">
                        <i class="fas fa-map-marker-alt text-danger"></i>
                        {{ $property->city }}, {{ $property->state }}
                    </p>
                    <p class="card-text">{{ Str::limit($property->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary">{{ $property->formatted_price }}</span>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted">
                            <i class="fas fa-bed"></i> {{ $property->bedrooms }} beds |
                            <i class="fas fa-bath"></i> {{ $property->bathrooms }} baths |
                            <i class="fas fa-ruler-combined"></i> {{ $property->square_feet }} sqft
                        </small>
                    </div>
                    @auth
                    <a href="{{ route('properties.show', $property) }}" class="btn btn-primary mt-3 w-100">View
                        Details</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary mt-3 w-100">Sign in to View</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Call to Action -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <div class="card bg-light">
                <div class="card-body py-5">
                    <h2 class="card-title">Ready to Find Your Dream Home?</h2>
                    <p class="card-text">Connect with our expert agents to get personalized assistance</p>
                    <div class="mt-4">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">Contact an Agent</a>
                        <a href="{{ route('properties.index', ['type' => 'sale']) }}"
                            class="btn btn-outline-primary btn-lg">View All Properties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection