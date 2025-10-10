<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zillow: Real Estate, Apartments, Mortgages & Home Values</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #2a2a33;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            background: #fff;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .hamburger {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            display: none;
            flex-direction: column;
            gap: 4px;
        }

        @media (max-width: 991px) {
            .hamburger {
                display: flex;
            }
        }

        .hamburger span {
            width: 24px;
            height: 3px;
            background: #2a2a33;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .logo svg {
            display: block;
        }

        .nav-desktop {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        @media (max-width: 991px) {
            .nav-desktop {
                display: none;
            }
        }

        .nav-desktop a {
            color: #2a2a33;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-desktop a:hover {
            color: #0074e4;
        }

        .sign-in-btn {
            background: none;
            border: 1px solid #2a2a33;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sign-in-btn:hover {
            background: #f7f7f7;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: -320px;
            top: 0;
            width: 320px;
            height: 100vh;
            background: #fff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transition: left 0.3s ease;
            z-index: 1001;
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0;
        }

        .close-btn {
            position: absolute;
            right: 1rem;
            top: 1rem;
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: #2a2a33;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        .close-btn:hover {
            background: #f7f7f7;
        }

        .sidebar-content {
            padding: 4rem 0 2rem;
        }

        .menu-item {
            border-bottom: 1px solid #e8e8e8;
        }

        .menu-toggle {
            width: 100%;
            background: none;
            border: none;
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.3s ease;
        }

        .menu-toggle:hover {
            background: #f7f7f7;
        }

        .arrow {
            font-size: 1.5rem;
            color: #0074e4;
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
                url("https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80");
            background-size: cover;
            background-position: center;
            padding: 6rem 0;
            min-height: 500px;
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-title {
            color: #fff;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            line-height: 1.1;
        }

        .search-container {
            display: flex;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin-bottom: 1rem;
        }

        .search-input {
            flex: 1;
            border: none;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            outline: none;
        }

        .search-btn {
            background: #0074e4;
            border: none;
            padding: 1rem 1.5rem;
            cursor: pointer;
            color: #fff;
            transition: background 0.3s ease;
        }

        .search-btn:hover {
            background: #005bb5;
        }

        .recommendations-btn {
            background: none;
            border: 2px solid #fff;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .recommendations-btn:hover {
            background: #fff;
            color: #2a2a33;
        }

        /* Cards Section */
        .cards-section {
            padding: 4rem 0;
            background: #f7f7f7;
        }

        .info-card {
            background: #fff;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            height: 100%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        .card-illustration {
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: center;
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .card-text {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .card-btn {
            background: none;
            border: 2px solid #0074e4;
            color: #0074e4;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .card-btn:hover {
            background: #0074e4;
            color: #fff;
        }

        /* BuyAbility Section */
        .buyability-section {
            padding: 4rem 0;
            background: #fff;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-align: center;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }

        .calculator-card {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .calculator-header {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .calculator-subtitle {
            font-size: 0.9rem;
            color: #666;
        }

        .calculator-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .calculator-label {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2a2a33;
        }

        .calculator-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: #0074e4;
        }

        .calculator-btn {
            width: 100%;
            background: #0074e4;
            border: none;
            color: #fff;
            padding: 1rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 2rem;
            transition: background 0.3s ease;
        }

        .calculator-btn:hover {
            background: #005bb5;
        }

        .property-cards-scroll {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding: 1rem 0;
        }

        .property-card {
            position: relative;
            min-width: 280px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .property-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: #d32f2f;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .property-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Recommendations Section */
        .recommendations-section {
            padding: 4rem 0;
            background: #f7f7f7;
        }

        .section-text {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .primary-btn {
            background: #0074e4;
            border: none;
            color: #fff;
            padding: 1rem 3rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .primary-btn:hover {
            background: #005bb5;
        }

        .recommendation-visual {
            position: relative;
        }

        .recommendation-card {
            background: #fff;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .rec-icon {
            flex-shrink: 0;
        }

        .rec-text {
            line-height: 1.5;
        }

        .rec-text strong {
            font-weight: 700;
        }

        .rec-text span {
            color: #666;
            font-size: 0.9rem;
        }

        .property-preview {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin-top: 2rem;
        }

        .preview-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .property-details {
            padding: 1.5rem;
        }

        .property-price {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .property-specs {
            color: #666;
            font-size: 0.95rem;
        }

        /* About Recommendations */
        .about-recommendations {
            padding: 4rem 0;
            background: #fff;
        }

        .about-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-align: center;
        }

        .about-text {
            text-align: center;
            color: #666;
            line-height: 1.6;
            max-width: 900px;
            margin: 0 auto 3rem;
        }

        .navigation-tabs {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .nav-tab {
            background: none;
            border: 1px solid #e8e8e8;
            padding: 1rem 2rem;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-tab:hover {
            background: #f7f7f7;
            border-color: #0074e4;
        }

        .arrow-down {
            transform: rotate(90deg);
            color: #0074e4;
        }

        /* Footer */
        .footer {
            background: #f7f7f7;
            padding: 3rem 0 1rem;
            border-top: 1px solid #e8e8e8;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 2rem;
            justify-content: center;
        }

        .footer-links a {
            color: #0074e4;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #005bb5;
            text-decoration: underline;
        }

        .footer-legal {
            max-width: 900px;
            margin: 0 auto 2rem;
            font-size: 0.85rem;
            color: #666;
            line-height: 1.6;
        }

        .footer-legal p {
            margin-bottom: 0.75rem;
        }

        .footer-legal a {
            color: #0074e4;
            text-decoration: none;
        }

        .footer-legal a:hover {
            text-decoration: underline;
        }

        .contact-link {
            font-weight: 600;
        }

        .app-downloads {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .app-badge img {
            height: 40px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 2rem;
            border-top: 1px solid #e8e8e8;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .social-links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
        }

        .social-icon:hover {
            opacity: 0.7;
        }

        .copyright {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #666;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .navigation-tabs {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-tab {
                justify-content: space-between;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .property-cards-scroll {
                overflow-x: scroll;
                -webkit-overflow-scrolling: touch;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar Menu -->
    <div class="sidebar" id="sidebar">
        <button class="close-btn" id="closeBtn">&times;</button>
        <div class="sidebar-content">
            <div class="menu-item">
                <button class="menu-toggle">
                    Buy
                    <span class="arrow">›</span>
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-toggle">
                    Rent
                    <span class="arrow">›</span>
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-toggle">
                    Sell
                    <span class="arrow">›</span>
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-toggle">
                    Get a mortgage
                    <span class="arrow">›</span>
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-toggle">
                    Find an agent
                    <span class="arrow">›</span>
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-toggle">
                    Manage rentals
                    <span class="arrow">›</span>
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-toggle">
                    Advertise
                </button>
            </div>
            <div class="menu-item">
                <button class="menu-toggle">
                    Get help
                </button>
            </div>
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
                    <svg width="120" height="30" viewBox="0 0 120 30" fill="#0074e4">
                        <path
                            d="M12 3l-12 9h6v12h12v-12h6l-12-9zm78 0v6h-12v18h-6v-18h-12v-6h30zm-48 0v24h6v-9h9v9h6v-24h-6v9h-9v-9h-6zm-18 6v18h6v-18h-6z" />
                    </svg>
                </div>
                <div class="nav-desktop">
                    <a href="#">Buy</a>
                    <a href="#">Rent</a>
                    <a href="#">Sell</a>
                    <a href="#">Get a mortgage</a>
                    <a href="#">Find an agent</a>
                    <a href="#">Manage rentals</a>
                    <a href="#">Advertise</a>
                    <a href="#">Get help</a>
                </div>
                <button class="sign-in-btn">Sign in</button>
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
                        <button class="card-btn">Find a local agent</button>
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
                        <button class="card-btn">Find rentals</button>
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
                        <button class="card-btn">See your options</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BuyAbility Section -->
    <section class="buyability-section">
        <div class="container">
            <h2 class="section-title">Find homes you can afford with BuyAbility<sup>℠</sup></h2>
            <p class="section-subtitle">Answer a few questions. We'll highlight homes you're likely to qualify for.</p>
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="calculator-card">
                        <div class="calculator-header">
                            <svg width="120" height="30" viewBox="0 0 120 30" fill="#0074e4">
                                <path
                                    d="M12 3l-12 9h6v12h12v-12h6l-12-9zm78 0v6h-12v18h-6v-18h-12v-6h30zm-48 0v24h6v-9h9v9h6v-24h-6v9h-9v-9h-6zm-18 6v18h6v-18h-6z" />
                            </svg>
                            <span class="calculator-subtitle">Home Loans</span>
                        </div>
                        <div class="calculator-row">
                            <span class="calculator-label">$ - -</span>
                            <span class="calculator-value">$ - -</span>
                        </div>
                        <div class="calculator-row">
                            <span class="calculator-label">Suggested target price</span>
                            <span class="calculator-label">BuyAbility<sup>℠</sup></span>
                        </div>
                        <div class="calculator-row mt-4">
                            <span class="calculator-label">$ - -</span>
                            <span class="calculator-label">- - %</span>
                            <span class="calculator-label">- - %</span>
                        </div>
                        <div class="calculator-row">
                            <span class="calculator-label">Mo. payment</span>
                            <span class="calculator-label">Today's rate</span>
                            <span class="calculator-label">APR</span>
                        </div>
                        <button class="calculator-btn">Let's get started</button>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="property-cards-scroll">
                        <div class="property-card">
                            <div class="property-badge">Within BuyAbility</div>
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                alt="Property" class="property-image">
                        </div>
                        <div class="property-card">
                            <div class="property-badge">Within BuyAbility</div>
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2075&q=80"
                                alt="Property" class="property-image">
                        </div>
                        <div class="property-card">
                            <div class="property-badge">Within BuyAbility</div>
                            <img src="https://images.unsplash.com/photo-1600585154340-9633f73ab5f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                alt="Property" class="property-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Home Recommendations Section -->
    <section class="recommendations-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Get home recommendations</h2>
                    <p class="section-text">Sign in for a more personalized experience.</p>
                    <button class="primary-btn">Sign in</button>
                </div>
                <div class="col-lg-6">
                    <div class="recommendation-visual">
                        <div class="recommendation-card budget">
                            <div class="rec-icon">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="#fff">
                                    <circle cx="20" cy="20" r="18" fill="#0d7a5f" />
                                    <path
                                        d="M20 10c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10-4.5-10-10-10zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8z"
                                        fill="#fff" />
                                    <path d="M20 14c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6z" fill="#fff" />
                                </svg>
                            </div>
                            <div class="rec-text">
                                <strong>Recommended homes</strong><br>
                                <span>based on your monthly budget</span>
                            </div>
                        </div>
                        <div class="recommendation-card location">
                            <div class="rec-icon">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="#fff">
                                    <circle cx="20" cy="20" r="18" fill="#ff6b35" />
                                    <path
                                        d="M20 10c-4.4 0-8 3.6-8 8 0 6 8 14 8 14s8-8 8-14c0-4.4-3.6-8-8-8zm0 11c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z"
                                        fill="#fff" />
                                </svg>
                            </div>
                            <div class="rec-text">
                                <strong>Recommended homes</strong><br>
                                <span>based on your preferred location</span>
                            </div>
                        </div>
                        <div class="property-preview">
                            <img src="https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1892&q=80"
                                alt="Property preview" class="preview-image">
                            <div class="property-details">
                                <div class="property-price">$695,000</div>
                                <div class="property-specs">4 bd | 3 ba | 3,102 sqft | House for Sale</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Recommendations Section -->
    <section class="about-recommendations">
        <div class="container">
            <h3 class="about-title">About Zillow's Recommendations</h3>
            <p class="about-text">Recommendations are based on your location and search activity, such as the homes
                you've viewed and saved and the filters you've used. We use this information to bring similar homes to
                your attention, so you don't miss out.</p>
            <div class="navigation-tabs">
                <button class="nav-tab">Real Estate <span class="arrow-down">›</span></button>
                <button class="nav-tab">Rentals <span class="arrow-down">›</span></button>
                <button class="nav-tab">Mortgage Rates <span class="arrow-down">›</span></button>
                <button class="nav-tab">Browse Homes <span class="arrow-down">›</span></button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-links">
                <a href="#">About</a>
                <a href="#">Zestimates</a>
                <a href="#">Research</a>
                <a href="#">Careers</a>
                <a href="#">Careers - U.S. Privacy Notice</a>
                <a href="#">Careers - Mexico Privacy Notice</a>
                <a href="#">Help</a>
                <a href="#">Advertise</a>
                <a href="#">Fair Housing Guide</a>
                <a href="#">Advocacy</a>
                <a href="#">Terms of use</a>
            </div>
            <div class="footer-links">
                <a href="#">Privacy Notice</a>
                <a href="#">Ad Choices</a>
                <a href="#">Cookie Preference</a>
                <a href="#">Learn</a>
                <a href="#">AI</a>
                <a href="#">Mobile Apps</a>
            </div>
            <div class="footer-links">
                <a href="#">Trulia</a>
                <a href="#">StreetEasy</a>
                <a href="#">HotPads</a>
                <a href="#">Out East</a>
                <a href="#">ShowingTime+</a>
            </div>
            <div class="footer-legal">
                <p>Zillow Group is committed to ensuring digital accessibility for individuals with disabilities. We are
                    continuously working to improve the accessibility of our web experience for everyone, and we welcome
                    feedback and accommodation requests. If you wish to report an issue or seek an accommodation, please
                    <a href="#">let us know</a>.</p>
                <p>Zillow, Inc. holds real estate brokerage <a href="#">licenses</a> in multiple states. Zillow
                    (Canada), Inc. holds real estate brokerage <a href="#">licenses</a> in multiple provinces.</p>
                <p>This site is not authorized by the New York State Department of Financial Services. No mortgage
                    solicitation activity or loan applications for properties located in the state of New York can be
                    facilitated through this site. All mortgage lending products and information provided by Zillow Home
                    Loans, LLC, NMLS #10287. <a href="#">NMLS Consumer Access</a></p>
                <p><a href="#">§ 442-H New York Standard Operating Procedures</a></p>
                <p><a href="#">§ New York Fair Housing Notice</a></p>
                <p>TREC: <a href="#">Information about brokerage services</a>, <a href="#">Consumer protection
                        notice</a></p>
                <p>California DRE #1522444</p>
                <p><a href="#" class="contact-link">Contact Zillow, Inc. Brokerage</a></p>
                <p>For listings in Canada, the trademarks REALTOR®, REALTORS®, and the REALTOR® logo are controlled by
                    The Canadian Real Estate Association (CREA) and identify real estate professionals who are members
                    of CREA. The trademarks MLS®, Multiple Listing Service® and the associated logos are owned by CREA
                    and identify the quality of services provided by real estate professionals who are members of CREA.
                    Used under license.</p>
            </div>
            <div class="app-downloads">
                <a href="#" class="app-badge">
                    <img src="https://tools-qr-production.s3.amazonaws.com/output/apple-toolbox/d7d3f5083c6adb2f5f03861b8b1a1c98/app-store-badge.svg"
                        alt="Download on App Store" height="40">
                </a>
                <a href="#" class="app-badge">
                    <img src="https://tools-qr-production.s3.amazonaws.com/output/apple-toolbox/d7d3f5083c6adb2f5f03861b8b1a1c98/google-play-badge.png"
                        alt="Get it on Google Play" height="40">
                </a>
            </div>
            <div class="footer-bottom">
                <div class="zillow-logo-footer">
                    <svg width="80" height="20" viewBox="0 0 120 30" fill="#333">
                        <path
                            d="M12 3l-12 9h6v12h12v-12h6l-12-9zm78 0v6h-12v18h-6v-18h-12v-6h30zm-48 0v24h6v-9h9v9h6v-24h-6v9h-9v-9h-6zm-18 6v18h6v-18h-6z" />
                    </svg>
                </div>
                <div class="social-links">
                    <span>Follow us:</span>
                    <a href="#" class="social-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#0074e4">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="social-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#0074e4">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="social-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#0074e4">
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                    </a>
                </div>
                <div class="copyright">
                    <span>© 2006-2025 Zillow</span>
                    <a href="#" class="equal-housing">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="#333">
                            <rect width="30" height="30" fill="none" stroke="#333" stroke-width="2" />
                            <path d="M15 8l-7 7h4v7h6v-7h4l-7-7z" fill="#333" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get DOM elements
        const hamburger = document.getElementById('hamburger');
        const closeBtn = document.getElementById('closeBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // Function to open sidebar
        function openSidebar() {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        }

        // Function to close sidebar
        function closeSidebar() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        // Event listeners
        hamburger.addEventListener('click', openSidebar);
        closeBtn.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // Close sidebar on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && sidebar.classList.contains('active')) {
                closeSidebar();
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991 && sidebar.classList.contains('active')) {
                closeSidebar();
            }
        });
    </script>
</body>

</html>