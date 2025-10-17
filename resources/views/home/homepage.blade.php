<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W4uhomes: Real Estate, Apartments, Mortgages & Home Values</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <!-- Notification Popup -->
    <div class="notification-popup" id="notificationPopup">
        <button class="notification-close" onclick="closeNotification()">&times;</button>
        <div class="notification-content" id="notificationContent">
            <!-- Content will be populated by JavaScript -->
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar Menu -->
    <div class="sidebar" id="sidebar">
        <button class="close-btn" id="closeBtn">&times;</button>
        <div class="sidebar-content">
            <!-- Buy Menu with Submenu -->
            <div class="menu-item">
                <button class="menu-toggle">
                    Buy
                    <span class="arrow">›</span>
                </button>
                <div class="submenu">
                    <div class="menu-item">
                        <a href="{{ route('properties.buy') }}" class="menu-toggle"
                            style="text-decoration: none; color: inherit;">
                            Homes for Sale
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-toggle" style="text-decoration: none; color: inherit;">
                            Foreclosures
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-toggle" style="text-decoration: none; color: inherit;">
                            New Construction
                        </a>
                    </div>
                </div>
            </div>

            <!-- Rent Menu with Submenu -->
            <div class="menu-item">
                <button class="menu-toggle">
                    Rent
                    <span class="arrow">›</span>
                </button>
                <div class="submenu">
                    <div class="menu-item">
                        <a href="{{ route('properties.rent') }}" class="menu-toggle"
                            style="text-decoration: none; color: inherit;">
                            Rental Homes
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-toggle" style="text-decoration: none; color: inherit;">
                            Apartments for Rent
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sell Menu -->
            <div class="menu-item">
                <a href="{{ route('properties.sold') }}" class="menu-toggle"
                    style="text-decoration: none; color: inherit;">
                    Sell
                    <span class="arrow">›</span>
                </a>
            </div>

            <!-- Mortgage Menu -->
            <div class="menu-item">
                <button class="menu-toggle">
                    Get a mortgage
                    <span class="arrow">›</span>
                </button>
                <div class="submenu">
                    <div class="menu-item">
                        <a href="#" class="menu-toggle" style="text-decoration: none; color: inherit;">
                            Mortgage Rates
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-toggle" style="text-decoration: none; color: inherit;">
                            Pre-Approval
                        </a>
                    </div>
                </div>
            </div>

            <!-- Find Agent -->
            <div class="menu-item">
                <a href="#" class="menu-toggle" style="text-decoration: none; color: inherit;">
                    Find an agent
                </a>
            </div>

            <!-- Manage Rentals -->
            <div class="menu-item">
                <a href="#" class="menu-toggle" style="text-decoration: none; color: inherit;">
                    Manage rentals
                </a>
            </div>

            <!-- Information Pages -->
            <div class="menu-item">
                <a href="{{ route('about') }}" class="menu-toggle" style="text-decoration: none; color: inherit;">
                    About
                </a>
            </div>
            <div class="menu-item">
                <a href="{{ route('faq') }}" class="menu-toggle" style="text-decoration: none; color: inherit;">
                    FAQ
                </a>
            </div>
            <div class="menu-item">
                <a href="{{ route('contact') }}" class="menu-toggle" style="text-decoration: none; color: inherit;">
                    Contact
                </a>
            </div>

            <!-- Authentication Links -->
            @auth
            <div class="menu-item">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="menu-toggle"
                        style="background: none; border: none; width: 100%; text-align: left; font-size: 1rem; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
            @else
            <div class="menu-item">
                <a href="{{ route('login') }}" class="menu-toggle" style="text-decoration: none; color: inherit;">
                    Sign In
                </a>
            </div>
            <div class="menu-item">
                <a href="{{ route('register') }}" class="menu-toggle" style="text-decoration: none; color: inherit;">
                    Register
                </a>
            </div>
            @endauth
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <button class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="logo">
                    <a href="{{ route('home') }}" style="text-decoration: none;">
                        <svg width="120" height="30" viewBox="0 0 120 30" fill="#0074e4">
                            <path
                                d="M12 3l-12 9h6v12h12v-12h6l-12-9zm78 0v6h-12v18h-6v-18h-12v-6h30zm-48 0v24h6v-9h9v9h6v-24h-6v9h-9v-9h-6zm-18 6v18h6v-18h-6z" />
                        </svg>
                    </a>
                </div>
                <div class="nav-desktop">
                    <a href="{{ route('properties.buy') }}">Buy</a>
                    <a href="{{ route('properties.rent') }}">Rent</a>
                    <a href="{{ route('properties.sold') }}">Sold</a>
                    <a href="#">Get a mortgage</a>
                    <a href="#">Find an agent</a>
                    <a href="#">Manage rentals</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('faq') }}">FAQ</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </div>
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sign-in-btn">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="sign-in-btn">Sign in</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Rentals. Homes.<br>Agents. Loans.</h1>
                <div class="search-container">
                    <input type="text" class="search-input"
                        placeholder="Enter an address, neighborhood, city, or ZIP code">
                    <button class="search-btn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                        </svg>
                    </button>
                </div>
                <button class="recommendations-btn">Get home recommendations</button>
            </div>
        </div>
    </section>

    <!-- Three Cards Section -->
    <section class="cards-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="info-card">
                        <div class="card-illustration">
                            <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                alt="Buy a home"
                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                        </div>
                        <h3 class="card-title">Buy a home</h3>
                        <p class="card-text">A real estate agent can provide you with a clear breakdown of costs so that
                            you can avoid surprise expenses.</p>
                        <a href="{{ route('properties.buy') }}" class="card-btn">Find a local agent</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="info-card">
                        <div class="card-illustration">
                            <img src="https://images.unsplash.com/photo-1556020685-ae41abfc9365?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80"
                                alt="Rent a home"
                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                        </div>
                        <h3 class="card-title">Rent a home</h3>
                        <p class="card-text">We're creating a seamless online experience – from shopping on the largest
                            rental network, to applying, to paying rent.</p>
                        <a href="{{ route('properties.rent') }}" class="card-btn">Find rentals</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="info-card">
                        <div class="card-illustration">
                            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80"
                                alt="Sell a home"
                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                        </div>
                        <h3 class="card-title">Sell a home</h3>
                        <p class="card-text">No matter what path you take to sell your home, we can help you navigate a
                            successful sale.</p>
                        <a href="{{ route('properties.sold') }}" class="card-btn">See your options</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section class="buyability-section">
        <div class="container">
            <h2 class="section-title">Featured Properties</h2>
            <p class="section-subtitle">Discover our handpicked selection of premium properties</p>

            <div class="row g-4">
                @foreach($featuredProperties as $property)
                <div class="col-lg-4 col-md-6">
                    <div class="card property-card-custom h-100">
                        <img src="{{ $property->image ?? 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80' }}"
                            class="card-img-top" alt="{{ $property->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->title }}</h5>
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
                            </a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary mt-3 w-100">
                                View</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('properties.index') }}" class="btn btn-outline-primary">View All Properties</a>
            </div>
        </div>
    </section>

    <!-- Agents Section -->
    <section class="agents-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Meet Our Expert Agents</h2>
            <p class="section-subtitle text-center mb-5">Connect with our professional real estate agents for
                personalized service</p>

            <div class="row g-4">
                <!-- Lewis Morgan - Chicago -->
                <div class="col-lg-4 col-md-6">
                    <div class="agent-card text-center">
                        <div class="agent-image mb-3">
                            <img src="{{ asset('img/lewis.jpg') }}" alt="Lewis Morgan" class="img-fluid rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                        <h4 class="agent-name">Lewis Morgan</h4>
                        <p class="agent-location text-muted">Florida</p>
                        <div class="agent-contact">
                            <p class="agent-phone">
                                <i class="fas fa-phone"></i> +1 (510) 368-3855
                            </p>
                            <p class="agent-email">
                                <i class="fas fa-envelope"></i> lewismorgan0348@gmail.com
                            </p>
                        </div>
                        <div class="agent-social mt-3">
                            <a href="#" class="social-icon me-2">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-icon me-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- James Carter - Florida -->
                <div class="col-lg-4 col-md-6">
                    <div class="agent-card text-center">
                        <div class="agent-image mb-3">
                            <img src="{{ asset('img/james.jpg') }}" alt="James Carter" class="img-fluid rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                        <h4 class="agent-name">James Carter</h4>
                        <p class="agent-location text-muted">Florida</p>
                        <div class="agent-contact">
                            <p class="agent-phone">
                                <i class="fas fa-phone"></i> +1 (803) 801-9911
                            </p>
                            <p class="agent-email">
                                <i class="fas fa-envelope"></i> jamcarter677@gmail.com
                            </p>
                        </div>
                        <div class="agent-social mt-3">
                            <a href="#" class="social-icon me-2">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-icon me-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- William J Morgan - Florida -->
                <div class="col-lg-4 col-md-6">
                    <div class="agent-card text-center">
                        <div class="agent-image mb-3">
                            <img src="{{ asset('img/william.jpg') }}" alt="William J Morgan"
                                class="img-fluid rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                        <h4 class="agent-name">William J Morgan</h4>
                        <p class="agent-location text-muted">Florida</p>
                        <div class="agent-contact">
                            <p class="agent-phone">
                                <i class="fas fa-phone"></i> Contact via Email
                            </p>
                            <p class="agent-email">
                                <i class="fas fa-envelope"></i> williamsjmorgan224@gmail.com
                            </p>
                        </div>
                        <div class="agent-social mt-3">
                            <a href="https://www.tiktok.com/@williamjmorgan1" target="_blank" class="social-icon me-2">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary btn-lg">Contact Our Team</a>
            </div>
        </div>
    </section>

    <!-- Company Contact Section -->
    <section class="company-contact-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title mb-4">W4UHomes Company</h2>
                    <p class="section-subtitle mb-4">Your trusted partner in real estate</p>

                    <div class="company-contact-info">
                        <div class="row justify-content-center">
                            <div class="col-md-6 mb-4">
                                <div class="contact-item">
                                    <i class="fab fa-whatsapp fa-2x text-primary mb-3"></i>
                                    <h5>WhatsApp</h5>
                                    <p class="contact-detail">+1 (270) 931-8101</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-item">
                                    <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                                    <h5>Email</h5>
                                    <p class="contact-detail">w4uhomes@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="company-social mt-4">
                            <h5 class="mb-3">Follow Us</h5>
                            <div class="social-links">
                                <a href="https://www.tiktok.com/@w4uhomes" target="_blank" class="social-icon me-3">
                                    <i class="fab fa-tiktok fa-2x"></i>
                                </a>
                                <a href="#" class="social-icon me-3">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                                <a href="#" class="social-icon me-3">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mt-5">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">Contact Us</a>
                        <a href="{{ route('about') }}" class="btn btn-outline-primary btn-lg">Learn More</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="recommendations-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">About Our Real Estate Platform</h2>
                    <p class="section-text">We are committed to making home buying, selling, and renting easier and more
                        transparent. With thousands of properties and experienced agents, we help you find your perfect
                        home.</p>
                    <div class="row mt-4">
                        <div class="col-6">
                            <h4>10,000+</h4>
                            <p>Properties Listed</p>
                        </div>
                        <div class="col-6">
                            <h4>500+</h4>
                            <p>Expert Agents</p>
                        </div>
                        <div class="col-6">
                            <h4>50+</h4>
                            <p>Cities Covered</p>
                        </div>
                        <div class="col-6">
                            <h4>15+</h4>
                            <p>Years Experience</p>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="primary-btn mt-3">Learn More About Us</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1973&q=80"
                        alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="about-recommendations">
        <div class="container">
            <h3 class="about-title">Frequently Asked Questions</h3>
            <p class="about-text">Find answers to common questions about buying, selling, and renting properties.</p>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            How do I start the home buying process?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Start by getting pre-approved for a mortgage, then work with one of our agents to find
                            properties that match your criteria and budget.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2">
                            What fees are involved in buying a home?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Typical fees include closing costs, inspection fees, appraisal fees, and agent commissions.
                            We provide transparent breakdowns of all expected costs.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3">
                            How long does it take to sell a property?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            The average time to sell a property is 30-60 days, but this can vary based on market
                            conditions, location, and pricing strategy.
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('faq') }}" class="btn btn-outline-primary">View All FAQs</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="cards-section">
        <div class="container">
            <h2 class="section-title text-center mb-4">Contact Us</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5"
                                        required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-links">
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('faq') }}">FAQ</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('properties.buy') }}">Buy</a>
                <a href="{{ route('properties.rent') }}">Rent</a>
                <a href="{{ route('properties.sold') }}">Sold</a>
            </div>

            <div class="footer-legal">
                <p>© 2006-2025 W4uhomes. All rights reserved.</p>
            </div>

            <div class="footer-bottom">
                <div class="social-links">
                    <span>Follow us:</span>
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        // Testimonial notifications data
        const testimonials = @json($testimonials);
        let currentTestimonialIndex = 0;
        
        function showNotification() {
            if (testimonials.length === 0) return;
            
            const testimonial = testimonials[currentTestimonialIndex];
            const popup = document.getElementById('notificationPopup');
            const content = document.getElementById('notificationContent');
            
            const icons = {
                'bought': '🏠',
                'rented': '🔑', 
                'sold': '💰'  
            };
            
            content.innerHTML = `
                <strong>${testimonial.name} from ${testimonial.country}</strong> just ${testimonial.transaction_type} a home!<br>
                ${icons[testimonial.transaction_type]} $${testimonial.amount}<br>
                <small>"${testimonial.testimonial}"</small>
            `;
            
            popup.style.display = 'block';
            
            // Auto hide after 8 seconds
            setTimeout(() => {
                popup.style.display = 'none';
            }, 8000);
            
            // Move to next testimonial
            currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
        }
        
        function closeNotification() {
            document.getElementById('notificationPopup').style.display = 'none';
        }
        
        // Show first notification after 3 seconds
        setTimeout(showNotification, 3000);
        
        // Show new notification every 15 seconds
        setInterval(showNotification, 15000);
        
        // Also show notification when user interacts with page
        document.addEventListener('click', function() {
            if (Math.random() > 0.7) { // 30% chance on click
                showNotification();
            }
        });
    </script>
</body>

</html>