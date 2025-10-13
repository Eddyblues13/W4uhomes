<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'W4uhomes - Real Estate')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
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

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

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
    @yield('scripts')
</body>

</html>