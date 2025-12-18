<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: bold;
            color: #4e73df !important;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        h1 {
            font-weight: 700;
            color: #333;
            margin-bottom: 1.5rem;
        }

        /* ===== NAVBAR ACTIVE LINE ===== */
        .nav-link {
            position: relative;
            padding-bottom: 8px;
            transition: color 0.2s ease;
        }

        .nav-link.active {
            font-weight: 600;
            color: #4e73df !important;
        }

        .nav-link.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 3px;
            background-color: #4e73df;
            border-radius: 3px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">

        <a class="navbar-brand" href="{{ route('books.index') }}">📚 LibraryAdmin</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        🏠 Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}"
                       href="{{ route('books.index') }}">
                        Books
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                       href="{{ route('categories.index') }}">
                        Categories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}"
                       href="{{ route('members.index') }}">
                        Members
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('book-conditions.*') ? 'active' : '' }}"
                       href="{{ route('book-conditions.index') }}">
                        Conditions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('borrowings.*') ? 'active' : '' }}"
                       href="{{ route('borrowings.index') }}">
                        Borrowings
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('returns.*') ? 'active' : '' }}"
                       href="{{ route('returns.index') }}">
                        Returns
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success rounded-pill text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
