<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="/">
            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                 style="width: 40px; height: 40px;">
                <i class="bi bi-compass text-white"></i>
            </div>
            <div>
                <div class="fw-bold fs-5 mb-0">Travel Jogja</div>
                <small class="text-muted small">Professional Tour</small>
            </div>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-primary' : 'text-dark' }}" href="/">
                        <i class="bi bi-house-door me-1"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark" href="/#services" data-section="services">
                        <i class="bi bi-gear me-1"></i>Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('tours') ? 'active text-primary' : 'text-dark' }}" href="{{ route('tours') }}">
                        <i class="bi bi-map me-1"></i>Paket Wisata
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('gallery') ? 'active text-primary' : 'text-dark' }}" href="{{ route('gallery') }}">
                        <i class="bi bi-images me-1"></i>Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('blog') ? 'active text-primary' : 'text-dark' }}" href="{{ route('blog') }}">
                        <i class="bi bi-pencil-square me-1"></i>Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark" href="/#contact" data-section="contact">
                        <i class="bi bi-envelope me-1"></i>Kontak
                    </a>
                </li>
            </ul>

            <!-- Auth Links -->
            <ul class="navbar-nav">
                @auth
                    @if(auth()->user()->isAdminLevel())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold text-dark" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-shield-check me-1 text-primary"></i>Admin Panel
                            </a>
                            <ul class="dropdown-menu shadow-lg border-0">
                                <li><a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                                </a></li>
                                @if(auth()->user()->isAdmin())
                                <li><a class="dropdown-item py-2" href="{{ route('admin.user.index') }}">
                                    <i class="bi bi-people me-2"></i>Kelola User
                                </a></li>
                                @endif
                                <li><a class="dropdown-item py-2" href="{{ route('admin.blog.index') }}">
                                    <i class="bi bi-pencil-square me-2"></i>Kelola Blog
                                </a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('admin.service.index') }}">
                                    <i class="bi bi-gear me-2"></i>Kelola Layanan
                                </a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('admin.tour.index') }}">
                                    <i class="bi bi-map me-2"></i>Kelola Tour
                                </a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('admin.gallery.index') }}">
                                    <i class="bi bi-images me-2"></i>Kelola Galeri
                                </a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold text-dark d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2"
                                 style="width: 32px; height: 32px;">
                                <i class="bi bi-person-fill text-white small"></i>
                            </div>
                            <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0">
                            <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2"></i>Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2 text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-dark" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary rounded-pill px-4 py-2 ms-2 fw-semibold" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i>Daftar
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script>
    // Function to set active nav link based on current section
    function setActiveNavLink() {
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link[data-section]');
        const currentHash = window.location.hash.substring(1); // Remove #

        navLinks.forEach(link => {
            link.classList.remove('active', 'text-primary');
            link.classList.add('text-dark');
        });

        if (currentHash) {
            const activeLink = document.querySelector(`.navbar-nav .nav-link[data-section="${currentHash}"]`);
            if (activeLink) {
                activeLink.classList.add('active', 'text-primary');
                activeLink.classList.remove('text-dark');
            }
        } else {
            // Default to home if no hash
            const homeLink = document.querySelector('.navbar-nav .nav-link[href="/"]');
            if (homeLink) {
                homeLink.classList.add('active', 'text-primary');
                homeLink.classList.remove('text-dark');
            }
        }
    }

    // Set active on page load
    document.addEventListener('DOMContentLoaded', setActiveNavLink);

    // Set active on hash change
    window.addEventListener('hashchange', setActiveNavLink);

    // Handle smooth scroll clicks
    document.querySelectorAll('.navbar-nav .nav-link[data-section]').forEach(link => {
        link.addEventListener('click', function(e) {
            // Allow default behavior for smooth scroll
            setTimeout(setActiveNavLink, 100); // Small delay to allow hash to update
        });
    });
</script>
