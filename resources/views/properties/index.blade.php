@extends('layouts.app')

@section('title', 'Properties - ' . ucfirst($type))

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ ucfirst($type) }} Properties</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="section-title">{{ ucfirst($type) }} Properties</h1>
            <p class="section-subtitle">Browse our selection of {{ $type }} properties</p>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('properties.index') }}" method="GET">
                        <input type="hidden" name="type" value="{{ $type }}">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="price_min" class="form-label">Min Price</label>
                                <input type="number" class="form-control" id="price_min" name="price_min"
                                    placeholder="Min Price">
                            </div>
                            <div class="col-md-3">
                                <label for="price_max" class="form-label">Max Price</label>
                                <input type="number" class="form-control" id="price_max" name="price_max"
                                    placeholder="Max Price">
                            </div>
                            <div class="col-md-3">
                                <label for="bedrooms" class="form-label">Bedrooms</label>
                                <select class="form-select" id="bedrooms" name="bedrooms">
                                    <option value="">Any</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>
                                    <option value="5">5+</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                <select class="form-select" id="bathrooms" name="bathrooms">
                                    <option value="">Any</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                                <a href="{{ route('properties.index', ['type' => $type]) }}"
                                    class="btn btn-outline-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Properties Grid -->
    <div class="row">
        @forelse($properties as $property)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card property-card-custom h-100">
                <img src="{{ $property->main_image_url ?? 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80' }}"
                    class="card-img-top" alt="{{ $property->title }}" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $property->title }}</h5>
                    <p class="card-text text-muted">{{ $property->address }}, {{ $property->city }}, {{ $property->state
                        }}</p>
                    <p class="card-text">{{ Str::limit($property->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary">{{ $property->formatted_price }}</span>
                        <span
                            class="badge bg-{{ $property->type == 'sale' ? 'primary' : ($property->type == 'rent' ? 'success' : 'secondary') }}">
                            {{ ucfirst($property->type) }}
                        </span>
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
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-home fa-3x text-muted mb-3"></i>
                <h3>No Properties Found</h3>
                <p class="text-muted">No {{ $type }} properties match your criteria.</p>
                <a href="{{ route('properties.index', ['type' => $type]) }}" class="btn btn-primary">Clear Filters</a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($properties->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            <nav aria-label="Properties pagination">
                {{ $properties->links() }}
            </nav>
        </div>
    </div>
    @endif
</div>
@endsection