@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="section-title">Contact Us</h1>
            <p class="section-subtitle">Get in touch with our team for any questions or assistance</p>
        </div>
    </div>

    <div class="row">
        <!-- Contact Information -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title mb-4">Get In Touch</h4>

                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-primary fa-2x"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Address</h5>
                            <p class="text-muted">123 Real Estate Ave<br>Suite 100<br>San Francisco, CA 94105</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-phone text-primary fa-2x"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Phone</h5>
                            <p class="text-muted">+1 (555) 123-4567<br>Mon-Fri 9am-6pm PST</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-envelope text-primary fa-2x"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Email</h5>
                            <p class="text-muted">info@realestate.com<br>support@realestate.com</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-clock text-primary fa-2x"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Business Hours</h5>
                            <p class="text-muted">Monday - Friday: 9am - 6pm<br>Saturday: 10am - 4pm<br>Sunday: Closed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Send us a Message</h4>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subject" class="form-label">Subject *</label>
                                <select class="form-select @error('subject') is-invalid @enderror" id="subject"
                                    name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="buying" {{ old('subject')=='buying' ? 'selected' : '' }}>Buying a
                                        Home</option>
                                    <option value="selling" {{ old('subject')=='selling' ? 'selected' : '' }}>Selling a
                                        Home</option>
                                    <option value="renting" {{ old('subject')=='renting' ? 'selected' : '' }}>Renting a
                                        Property</option>
                                    <option value="general" {{ old('subject')=='general' ? 'selected' : '' }}>General
                                        Inquiry</option>
                                    <option value="technical" {{ old('subject')=='technical' ? 'selected' : '' }}>
                                        Technical Support</option>
                                </select>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message"
                                name="message" rows="6" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" {{
                                old('newsletter') ? 'checked' : '' }}>
                            <label class="form-check-label" for="newsletter">
                                Subscribe to our newsletter for updates and market insights
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Office Locations -->
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center mb-4">Our Office Locations</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-building fa-3x text-primary mb-3"></i>
                            <h5>San Francisco</h5>
                            <p class="text-muted">123 Real Estate Ave<br>Suite 100<br>San Francisco, CA 94105</p>
                            <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-building fa-3x text-primary mb-3"></i>
                            <h5>New York</h5>
                            <p class="text-muted">456 Property Blvd<br>Floor 25<br>New York, NY 10001</p>
                            <p><strong>Phone:</strong> +1 (555) 234-5678</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-building fa-3x text-primary mb-3"></i>
                            <h5>Chicago</h5>
                            <p class="text-muted">789 Home Street<br>Suite 300<br>Chicago, IL 60601</p>
                            <p><strong>Phone:</strong> +1 (555) 345-6789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection