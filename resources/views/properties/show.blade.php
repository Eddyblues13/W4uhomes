@extends('layouts.app')

@section('title', $property->title)

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('properties.index', ['type' => $property->type]) }}">{{
                            ucfirst($property->type) }} Properties</a></li>
                    <li class="breadcrumb-item active">{{ $property->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- Property Images -->
        <div class="col-lg-8">
            <div id="propertyCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if($property->images && count($property->images) > 0)
                    @foreach($property->images as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ $image }}" class="d-block w-100" alt="Property image {{ $key + 1 }}"
                            style="height: 500px; object-fit: cover;">
                    </div>
                    @endforeach
                    @else
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                            class="d-block w-100" alt="Property image" style="height: 500px; object-fit: cover;">
                    </div>
                    @endif
                </div>
                @if($property->images && count($property->images) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @endif
            </div>

            <!-- Property Details -->
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="card-title h2">{{ $property->title }}</h1>
                    <h3 class="text-primary mb-3">{{ $property->formatted_price }}</h3>

                    <div class="row mb-4">
                        <div class="col-md-3 col-6 text-center">
                            <div class="border rounded p-3">
                                <i class="fas fa-bed fa-2x text-primary mb-2"></i>
                                <h5>{{ $property->bedrooms }}</h5>
                                <small class="text-muted">Bedrooms</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="border rounded p-3">
                                <i class="fas fa-bath fa-2x text-primary mb-2"></i>
                                <h5>{{ $property->bathrooms }}</h5>
                                <small class="text-muted">Bathrooms</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="border rounded p-3">
                                <i class="fas fa-ruler-combined fa-2x text-primary mb-2"></i>
                                <h5>{{ $property->square_feet }}</h5>
                                <small class="text-muted">Sq Ft</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="border rounded p-3">
                                <i class="fas fa-home fa-2x text-primary mb-2"></i>
                                <h5>{{ ucfirst($property->type) }}</h5>
                                <small class="text-muted">Type</small>
                            </div>
                        </div>
                    </div>

                    <h4 class="mb-3">Description</h4>
                    <p class="card-text">{{ $property->description }}</p>

                    <h4 class="mb-3 mt-4">Address</h4>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt text-danger"></i>
                        {{ $property->address }}, {{ $property->city }}, {{ $property->state }} {{ $property->zip_code
                        }}
                    </p>
                </div>
            </div>

            <!-- Property Features -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Property Features</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i> {{ $property->bedrooms }} Bedrooms
                                </li>
                                <li><i class="fas fa-check text-success me-2"></i> {{ $property->bathrooms }} Bathrooms
                                </li>
                                <li><i class="fas fa-check text-success me-2"></i> {{ $property->square_feet }} Square
                                    Feet</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i> {{ $property->type == 'rent' ?
                                    'Available for Rent' : 'Available for Sale' }}</li>
                                <li><i class="fas fa-check text-success me-2"></i> Recently Updated</li>
                                <li><i class="fas fa-check text-success me-2"></i> Professional Photos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Contact Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Contact Agent</h5>
                    <form id="contactForm">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4"
                                required>I'm interested in this property at {{ $property->address }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Agent Info -->
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                        alt="Agent" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                    <h5>John Smith</h5>
                    <p class="text-muted">Real Estate Agent</p>
                    <div class="d-grid gap-2">
                        <a href="tel:+1234567890" class="btn btn-outline-primary">
                            <i class="fas fa-phone me-2"></i>Call Agent
                        </a>
                        <a href="mailto:john@example.com" class="btn btn-outline-primary">
                            <i class="fas fa-envelope me-2"></i>Email Agent
                        </a>
                    </div>
                </div>
            </div>

            <!-- Similar Properties -->
            @if($relatedProperties->count() > 0)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Similar Properties</h5>
                    @foreach($relatedProperties as $related)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="{{ $related->image }}" class="img-fluid rounded-start"
                                    alt="{{ $related->title }}" style="height: 80px; object-fit: cover;">
                            </div>
                            <div class="col-8">
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-1">{{ Str::limit($related->title, 25) }}</h6>
                                    <p class="card-text text-primary mb-1">{{ $related->formatted_price }}</p>
                                    <small class="text-muted">
                                        <i class="fas fa-bed"></i> {{ $related->bedrooms }}bd |
                                        <i class="fas fa-bath"></i> {{ $related->bathrooms }}ba
                                    </small>
                                    <a href="{{ route('properties.show', $related) }}"
                                        class="btn btn-sm btn-outline-primary mt-1 w-100">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Here you would typically send the form data to your server
    alert('Thank you for your interest! An agent will contact you soon.');
    this.reset();
});
</script>
@endsection
@endsection