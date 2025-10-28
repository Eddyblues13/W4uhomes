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
        <!-- Property Images Section -->
        <div class="col-lg-8">
            <div class="property-images-section mb-4">
                <h4 class="mb-3">Property Gallery</h4>

                <!-- Combined Images Slideshow -->
                @php
                $allImages = [];

                // Add main image first if exists
                if($property->main_image) {
                $allImages[] = asset($property->main_image);
                }

                // Add carousel images
                if($property->images && count($property->images) > 0) {
                foreach($property->images as $image) {
                $allImages[] = asset($image);
                }
                }

                // If no images at all, use default
                if(empty($allImages)) {
                $allImages[] = asset('images/default-property.jpg');
                }
                @endphp

                @if(count($allImages) > 0)
                <div class="property-slideshow">
                    <!-- Main Slideshow Container -->
                    <div class="slideshow-container position-relative">
                        <div class="main-slideshow">
                            @foreach($allImages as $index => $image)
                            <div class="slide @if($index === 0) active @endif" data-index="{{ $index }}">
                                <img src="{{ $image }}" alt="{{ $property->title }} - Image {{ $index + 1 }}"
                                    class="img-fluid rounded shadow-sm slideshow-image">
                                @if($index === 0 && $property->main_image)
                                <div class="image-badge">Main Image</div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <!-- Navigation Arrows -->
                        @if(count($allImages) > 1)
                        <button class="slideshow-nav slideshow-prev" onclick="changeSlide(-1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="slideshow-nav slideshow-next" onclick="changeSlide(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        @endif

                        <!-- Image Counter -->
                        <div class="slideshow-counter">
                            <span id="currentSlide">1</span> / <span id="totalSlides">{{ count($allImages) }}</span>
                        </div>

                        <!-- Fullscreen Toggle -->
                        <button class="fullscreen-toggle" onclick="toggleFullscreen()">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>

                    <!-- Thumbnail Navigation -->
                    @if(count($allImages) > 1)
                    <div class="thumbnail-nav mt-3">
                        <div class="row g-2">
                            @foreach($allImages as $index => $image)
                            <div class="col-md-2 col-sm-3 col-4">
                                <div class="thumbnail-container {{ $index === 0 ? 'active' : '' }}"
                                    onclick="goToSlide({{ $index }})">
                                    <img src="{{ $image }}" alt="{{ $property->title }} - Thumbnail {{ $index + 1 }}"
                                        class="img-fluid rounded thumbnail-image">
                                    @if($index === 0 && $property->main_image)
                                    <div class="thumbnail-badge">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                @else
                <div class="alert alert-warning text-center">
                    <i class="fas fa-exclamation-triangle"></i> No images available for this property.
                </div>
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
                                <h5>{{ number_format($property->square_feet) }}</h5>
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

                    <!-- Property ID -->
                    <div class="mt-4 pt-3 border-top">
                        <small class="text-muted">
                            <i class="fas fa-fingerprint"></i> Property ID: {{ $property->id }}
                        </small>
                    </div>
                </div>
            </div>

            <!-- Property Features -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Property Features</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i> {{ $property->bedrooms }} Bedrooms
                                </li>
                                <li><i class="fas fa-check text-success me-2"></i> {{ $property->bathrooms }} Bathrooms
                                </li>
                                <li><i class="fas fa-check text-success me-2"></i> {{
                                    number_format($property->square_feet) }} Square Feet</li>
                                <li><i class="fas fa-check text-success me-2"></i> Modern Kitchen Appliances</li>
                                <li><i class="fas fa-check text-success me-2"></i> Central Heating & Cooling</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i> {{ $property->type == 'rent' ?
                                    'Available for Rent' : ($property->type == 'buy' ? 'Available for Sale' : 'Sold') }}
                                </li>
                                <li><i class="fas fa-check text-success me-2"></i> Recently Updated</li>
                                <li><i class="fas fa-check text-success me-2"></i> Professional Photos</li>
                                <li><i class="fas fa-check text-success me-2"></i> Energy Efficient Windows</li>
                                <li><i class="fas fa-check text-success me-2"></i> Ample Storage Space</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location Map (Placeholder) -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Location</h4>
                    <div class="location-map-placeholder bg-light rounded text-center py-5">
                        <i class="fas fa-map-marked-alt fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Location Map</h5>
                        <p class="text-muted mb-0">{{ $property->address }}, {{ $property->city }}, {{ $property->state
                            }}
                        </p>
                        <small class="text-muted">Map integration can be added here</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Contact Agent Card -->
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Interested in this property?</h5>
                    <p class="text-muted mb-4">Chat directly with our agent to get more information or schedule a
                        viewing.</p>

                    <div class="agent-info mb-4">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                            alt="John Maxwell - Real Estate Agent" class="rounded-circle mb-3"
                            style="width: 80px; height: 80px; object-fit: cover;">
                        <h5>John Maxwell</h5>
                        <p class="text-muted">Real Estate Agent</p>
                        <div class="agent-stats">
                            <small class="text-muted">
                                <i class="fas fa-star text-warning"></i> 4.9 (128 reviews)
                            </small>
                        </div>
                    </div>

                    <!-- Chat Button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" onclick="chatWithAgent()">
                            <i class="fas fa-comments me-2"></i>Chat with Agent
                        </button>
                        <div class="response-time text-muted mt-2">
                            <small><i class="fas fa-clock me-1"></i>Average response time: 5 minutes</small>
                        </div>
                    </div>

                    <!-- Additional Contact Options -->
                    <div class="mt-4 pt-3 border-top">
                        <div class="row">
                            <div class="col-6">
                                <a href="tel:+1234567890" class="btn btn-outline-primary w-100 py-2">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <small class="text-muted d-block mt-1">Call</small>
                            </div>
                            <div class="col-6">
                                <a href="mailto:johnmax122@gmail.com" class="btn btn-outline-primary w-100 py-2">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <small class="text-muted d-block mt-1">Email</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Summary -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Property Summary</h5>
                    <div class="property-summary">
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Price:</span>
                            <strong>{{ $property->formatted_price }}</strong>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Type:</span>
                            <strong>{{ ucfirst($property->type) }}</strong>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Bedrooms:</span>
                            <strong>{{ $property->bedrooms }}</strong>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Bathrooms:</span>
                            <strong>{{ $property->bathrooms }}</strong>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Square Feet:</span>
                            <strong>{{ number_format($property->square_feet) }} sq ft</strong>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Location:</span>
                            <strong>{{ $property->city }}, {{ $property->state }}</strong>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Property ID:</span>
                            <strong>#{{ $property->id }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule Tour -->
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Schedule a Tour</h5>
                    <p class="text-muted mb-3">Visit this property in person</p>
                    <button class="btn btn-outline-primary w-100 mb-2" onclick="scheduleTour()">
                        <i class="fas fa-calendar-alt me-2"></i>Schedule Viewing
                    </button>
                    <small class="text-muted">Available for in-person tours</small>
                </div>
            </div>

            <!-- Similar Properties -->
            @if($relatedProperties && $relatedProperties->count() > 0)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Similar Properties</h5>
                    @foreach($relatedProperties as $related)
                    <div class="card mb-3 border">
                        <div class="row g-0">
                            <div class="col-4">
                                @if($related->main_image)
                                <img src="{{ asset($related->main_image) }}" class="img-fluid rounded-start"
                                    alt="{{ $related->title }}" style="height: 80px; object-fit: cover; width: 100%;">
                                @else
                                <img src="{{ asset('images/default-property.jpg') }}" class="img-fluid rounded-start"
                                    alt="{{ $related->title }}" style="height: 80px; object-fit: cover; width: 100%;">
                                @endif
                            </div>
                            <div class="col-8">
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-1">{{ Str::limit($related->title, 25) }}</h6>
                                    <p class="card-text text-primary mb-1 small">{{ $related->formatted_price }}</p>
                                    <small class="text-muted d-block">
                                        <i class="fas fa-bed"></i> {{ $related->bedrooms }}bd |
                                        <i class="fas fa-bath"></i> {{ $related->bathrooms }}ba
                                    </small>
                                    <a href="{{ route('properties.show', $related) }}"
                                        class="btn btn-sm btn-outline-primary mt-1 w-100">View Details</a>
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
    let currentSlideIndex = 0;
    const totalSlides = {{ count($allImages) }};
    let slideshowInterval;

    function showSlide(index) {
        const slides = document.querySelectorAll('.slide');
        const thumbnails = document.querySelectorAll('.thumbnail-container');
        const currentSlideElement = document.getElementById('currentSlide');
        
        // Hide all slides
        slides.forEach(slide => slide.classList.remove('active'));
        thumbnails.forEach(thumb => thumb.classList.remove('active'));
        
        // Show current slide
        slides[index].classList.add('active');
        thumbnails[index].classList.add('active');
        
        // Update counter
        currentSlideElement.textContent = index + 1;
        currentSlideIndex = index;
    }

    function changeSlide(direction) {
        let newIndex = currentSlideIndex + direction;
        
        if (newIndex >= totalSlides) {
            newIndex = 0;
        } else if (newIndex < 0) {
            newIndex = totalSlides - 1;
        }
        
        showSlide(newIndex);
        resetSlideshowTimer();
    }

    function goToSlide(index) {
        showSlide(index);
        resetSlideshowTimer();
    }

    function startSlideshow() {
        if (totalSlides > 1) {
            slideshowInterval = setInterval(() => {
                changeSlide(1);
            }, 5000); // Change slide every 5 seconds
        }
    }

    function stopSlideshow() {
        if (slideshowInterval) {
            clearInterval(slideshowInterval);
        }
    }

    function resetSlideshowTimer() {
        stopSlideshow();
        startSlideshow();
    }

    function toggleFullscreen() {
        const slideshowContainer = document.querySelector('.slideshow-container');
        
        if (!document.fullscreenElement) {
            if (slideshowContainer.requestFullscreen) {
                slideshowContainer.requestFullscreen();
            } else if (slideshowContainer.webkitRequestFullscreen) {
                slideshowContainer.webkitRequestFullscreen();
            } else if (slideshowContainer.msRequestFullscreen) {
                slideshowContainer.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            changeSlide(-1);
        } else if (e.key === 'ArrowRight') {
            changeSlide(1);
        } else if (e.key === 'Escape') {
            if (document.fullscreenElement) {
                toggleFullscreen();
            }
        }
    });

    // Swipe support for touch devices
    let touchStartX = 0;
    let touchEndX = 0;

    document.querySelector('.main-slideshow').addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    document.querySelector('.main-slideshow').addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        
        if (touchEndX < touchStartX - swipeThreshold) {
            changeSlide(1); // Swipe left - next slide
        } else if (touchEndX > touchStartX + swipeThreshold) {
            changeSlide(-1); // Swipe right - previous slide
        }
    }

    // Initialize slideshow
    document.addEventListener('DOMContentLoaded', function() {
        showSlide(0);
        if (totalSlides > 1) {
            startSlideshow();
        }
        
        // Pause slideshow on hover
        document.querySelector('.slideshow-container').addEventListener('mouseenter', stopSlideshow);
        document.querySelector('.slideshow-container').addEventListener('mouseleave', startSlideshow);
    });

    function chatWithAgent() {
        const propertyTitle = "{{ $property->title }}";
        const propertyPrice = "{{ $property->formatted_price }}";
        const propertyAddress = "{{ $property->address }}, {{ $property->city }}";
        
        alert(`Starting chat about this property...\n\nOur agent John Maxwell will contact you shortly.\n\nYou can also call: +1 (234) 567-8900\nOr email: john@example.com`);
    }

    function scheduleTour() {
        const propertyTitle = "{{ $property->title }}";
        const propertyAddress = "{{ $property->address }}, {{ $property->city }}";
        
        alert(`Scheduling a tour for:\n\n"${propertyTitle}"\n\nAddress: ${propertyAddress}\n\nOur agent will contact you to confirm the viewing time.`);
    }
</script>

<style>
    .property-slideshow {
        position: relative;
    }

    .slideshow-container {
        background: #000;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .main-slideshow {
        position: relative;
        width: 100%;
        height: 500px;
        background: #000;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slide.active {
        opacity: 1;
    }

    .slideshow-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #000;
    }

    .slideshow-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.9);
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .slideshow-nav:hover {
        background: white;
        transform: translateY(-50%) scale(1.1);
    }

    .slideshow-prev {
        left: 20px;
    }

    .slideshow-next {
        right: 20px;
    }

    .slideshow-counter {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        z-index: 10;
    }

    .fullscreen-toggle {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.7);
        border: none;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .fullscreen-toggle:hover {
        background: rgba(0, 0, 0, 0.9);
        transform: scale(1.1);
    }

    .thumbnail-nav {
        padding: 10px 0;
    }

    .thumbnail-container {
        position: relative;
        cursor: pointer;
        border-radius: 8px;
        overflow: hidden;
        border: 3px solid transparent;
        transition: all 0.3s ease;
        aspect-ratio: 4/3;
    }

    .thumbnail-container:hover {
        border-color: #007bff;
        transform: scale(1.05);
    }

    .thumbnail-container.active {
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.3);
    }

    .thumbnail-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .thumbnail-badge {
        position: absolute;
        top: 5px;
        right: 5px;
        background: #007bff;
        color: white;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
    }

    /* Fullscreen styles */
    .slideshow-container:fullscreen {
        width: 100vw;
        height: 100vh;
        background: #000;
    }

    .slideshow-container:fullscreen .main-slideshow {
        height: 100vh;
    }

    .slideshow-container:fullscreen .slideshow-image {
        object-fit: contain;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .main-slideshow {
            height: 400px;
        }

        .slideshow-nav {
            width: 40px;
            height: 40px;
        }

        .thumbnail-container {
            aspect-ratio: 1/1;
        }
    }

    @media (max-width: 576px) {
        .main-slideshow {
            height: 300px;
        }

        .slideshow-nav {
            width: 35px;
            height: 35px;
        }

        .slideshow-counter {
            bottom: 10px;
            font-size: 12px;
        }
    }

    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .breadcrumb {
        background-color: transparent;
        padding: 0;
    }

    .breadcrumb-item a {
        color: #6c757d;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        color: #007bff;
    }
</style>
@endsection
@endsection