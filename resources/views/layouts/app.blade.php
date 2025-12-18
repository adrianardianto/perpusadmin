<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; color: #4e73df !important; }
        .card { border: none; border-radius: 1rem; box-shadow: 0 4px 16px rgba(0,0,0,0.05); margin-bottom: 2rem; }
        .btn { border-radius: 0.5rem; }
        h1 { font-weight: 700; color: #333; margin-bottom: 1.5rem; }
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
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('dashboard') }}">🏠 Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('members.index') }}">Members</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('book-conditions.index') }}">Conditions</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('borrowings.index') }}">Borrowings</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('returns.index') }}">Returns</a></li>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
