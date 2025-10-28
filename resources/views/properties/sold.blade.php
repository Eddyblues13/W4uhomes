@extends('layouts.app')

@section('title', 'Sold Properties')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Sold Properties</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="section-title">Recently Sold Properties</h1>
            <p class="section-subtitle">Browse our recently sold properties to understand market trends</p>
        </div>
    </div>

    <!-- Market Insights -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h3>245</h3>
                            <p>Properties Sold This Month</p>
                        </div>
                        <div class="col-md-3">
                            <h3>98%</h3>
                            <p>List Price to Sale Price Ratio</p>
                        </div>
                        <div class="col-md-3">
                            <h3>22</h3>
                            <p>Average Days on Market</p>
                        </div>
                        <div class="col-md-3">
                            <h3>$525K</h3>
                            <p>Average Sale Price</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sold Properties -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-4">Recently Sold Properties</h2>
        </div>
        @foreach($properties as $property)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card property-card-custom h-100">
                <div class="position-relative">
                    <img src="{{ $property->main_image_url ?? 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1973&q=80' }}"
                        class="card-img-top" alt="{{ $property->title }}" style="height: 250px; object-fit: cover;">
                    <span class="position-absolute top-0 start-0 bg-secondary text-white px-3 py-1 m-2 rounded">
                        Sold
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
                        <small class="text-muted">Sold Price</small>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted">
                            <i class="fas fa-bed"></i> {{ $property->bedrooms }} beds |
                            <i class="fas fa-bath"></i> {{ $property->bathrooms }} baths |
                            <i class="fas fa-ruler-combined"></i> {{ $property->square_feet }} sqft
                        </small>
                    </div>
                    <div class="mt-3">
                        <small class="text-success">
                            <i class="fas fa-trophy"></i> Sold above asking price
                        </small>
                    </div>
                    @auth
                    <button class="btn btn-outline-secondary mt-3 w-100" disabled>Property Sold</button>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary mt-3 w-100">Sign in to View</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Selling Advice -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h2 class="text-center mb-4">Thinking of Selling Your Property?</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Why Sell With Us?</h5>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i> Expert pricing strategy</li>
                                <li><i class="fas fa-check text-success me-2"></i> Professional photography</li>
                                <li><i class="fas fa-check text-success me-2"></i> Wide marketing reach</li>
                                <li><i class="fas fa-check text-success me-2"></i> Skilled negotiation</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Get Your Home's Value</h5>
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Your Address" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Your Email" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Get Free Valuation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection