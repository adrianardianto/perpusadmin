<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin System</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4e73df;
            --primary-gradient: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            --glass-bg: rgba(255, 255, 255, 0.8);
            --glass-border: rgba(255, 255, 255, 0.2);
            --sidebar-width: 280px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
            color: #2d3436;
            overflow-x: hidden;
        }

        /* Modern Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #888; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #555; }

        /* Navbar Styling */
        .navbar {
            backdrop-filter: blur(10px);
            background: var(--glass-bg);
            border-bottom: 1px solid var(--glass-border);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.6rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            font-weight: 500;
            color: #636e72 !important;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background: rgba(78, 115, 223, 0.1);
        }

        .nav-link.active {
            color: white !important;
            background: var(--primary-gradient);
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 1.25rem;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        /* Button Styling */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.2);
        }

        .btn-primary:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(78, 115, 223, 0.3);
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="fas fa-book-open"></i>
            <span>LibraryAdmin</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">
                        <i class="fas fa-book"></i> Books
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        <i class="fas fa-tags"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}" href="{{ route('members.index') }}">
                        <i class="fas fa-users"></i> Members
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('book-conditions.*') ? 'active' : '' }}" href="{{ route('book-conditions.index') }}">
                        <i class="fas fa-shield-halved"></i> Conditions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('borrowings.*') ? 'active' : '' }}" href="{{ route('borrowings.index') }}">
                        <i class="fas fa-sign-out-alt"></i> Borrowings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('returns.*') ? 'active' : '' }}" href="{{ route('returns.index') }}">
                        <i class="fas fa-sign-in-alt"></i> Returns
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" data-aos="fade-down">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="fade-in">
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        easing: 'ease-out-quad'
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            document.querySelector('.navbar').classList.add('scrolled');
        } else {
            document.querySelector('.navbar').classList.remove('scrolled');
        }
    });
</script>
</body>
</html>
