@extends('layouts.app')

@section('title', 'Rent Properties')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Rent Properties</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="section-title">Rental Properties</h1>
            <p class="section-subtitle">Find your perfect rental home from our curated collection</p>
        </div>
    </div>

    <!-- Rental Features -->
    <div class="row mb-5">
        <div class="col-md-4 mb-3">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="fas fa-key fa-3x text-primary mb-3"></i>
                    <h5>Quick Move-In</h5>
                    <p class="text-muted">Many properties available for immediate move-in</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                    <h5>Verified Listings</h5>
                    <p class="text-muted">All properties are verified and professionally managed</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="fas fa-calendar-check fa-3x text-primary mb-3"></i>
                    <h5>Easy Application</h5>
                    <p class="text-muted">Streamlined application process with quick approvals</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Rental Properties -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-4">Featured Rental Properties</h2>
        </div>
        @foreach($properties as $property)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card property-card-custom h-100">
                <div class="position-relative">
                    <img src="{{ $property->main_image_url ?? 'https://images.unsplash.com/photo-1556020685-ae41abfc9365?ixlib=rb-4.0.3&auto=format&fit=crop&w=1887&q=80' }}"
                        class="card-img-top" alt="{{ $property->title }}" style="height: 250px; object-fit: cover;">
                    <span class="position-absolute top-0 start-0 bg-success text-white px-3 py-1 m-2 rounded">
                        For Rent
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
                        <span class="h5 text-primary">{{ $property->formatted_price }}/month</span>
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

    <!-- Rental Process -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body py-5">
                    <h2 class="text-center mb-4">How to Rent with Us</h2>
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <span class="h4 mb-0">1</span>
                            </div>
                            <h5 class="mt-3">Browse Listings</h5>
                            <p class="text-muted">Find properties that match your criteria</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <span class="h4 mb-0">2</span>
                            </div>
                            <h5 class="mt-3">Schedule Tour</h5>
                            <p class="text-muted">Visit properties you're interested in</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <span class="h4 mb-0">3</span>
                            </div>
                            <h5 class="mt-3">Apply Online</h5>
                            <p class="text-muted">Submit your application digitally</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <span class="h4 mb-0">4</span>
                            </div>
                            <h5 class="mt-3">Move In</h5>
                            <p class="text-muted">Sign lease and get keys</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection