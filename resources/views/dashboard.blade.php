@extends('layouts.app')

@section('content')
<div class="row mb-5">
    <div class="col-12 text-center">
        <h1 class="display-4 fw-bold text-primary">📚 Library Dashboard</h1>
        <p class="lead text-muted">Welcome to the Library Administration System</p>
    </div>
</div>

<div class="row g-4">
    <!-- Books Card -->
    <div class="col-md-4">
        <div class="card h-100 hover-shadow">
            <div class="card-body text-center p-5">
                <div class="display-1 mb-3">📖</div>
                <h3 class="card-title fw-bold">Books</h3>
                <p class="card-text text-muted">Manage book collection, authors, and years.</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary w-100 stretched-link">Manage Books</a>
            </div>
        </div>
    </div>

    <!-- Categories Card -->
    <div class="col-md-4">
        <div class="card h-100 hover-shadow">
            <div class="card-body text-center p-5">
                <div class="display-1 mb-3">📂</div>
                <h3 class="card-title fw-bold">Categories</h3>
                <p class="card-text text-muted">Organize books into genres and categories.</p>
                <a href="{{ route('categories.index') }}" class="btn btn-info text-white w-100 stretched-link">Manage Categories</a>
            </div>
        </div>
    </div>

    <!-- Members Card -->
    <div class="col-md-4">
        <div class="card h-100 hover-shadow">
            <div class="card-body text-center p-5">
                <div class="display-1 mb-3">👥</div>
                <h3 class="card-title fw-bold">Members</h3>
                <p class="card-text text-muted">Register and manage library members.</p>
                <a href="{{ route('members.index') }}" class="btn btn-success w-100 stretched-link">Manage Members</a>
            </div>
        </div>
    </div>

    <!-- Borrowings Card -->
    <div class="col-md-4">
        <div class="card h-100 hover-shadow">
            <div class="card-body text-center p-5">
                <div class="display-1 mb-3">📤</div>
                <h3 class="card-title fw-bold">Borrowings</h3>
                <p class="card-text text-muted">Process new book loans and track due dates.</p>
                <a href="{{ route('borrowings.index') }}" class="btn btn-warning text-dark w-100 stretched-link">View Borrowings</a>
            </div>
        </div>
    </div>

    <!-- Returns Card -->
    <div class="col-md-4">
        <div class="card h-100 hover-shadow">
            <div class="card-body text-center p-5">
                <div class="display-1 mb-3">📥</div>
                <h3 class="card-title fw-bold">Returns</h3>
                <p class="card-text text-muted">Process returns and calculate fines.</p>
                <a href="{{ route('returns.index') }}" class="btn btn-secondary w-100 stretched-link">Process Returns</a>
            </div>
        </div>
    </div>

    <!-- Book Conditions Card -->
    <div class="col-md-4">
        <div class="card h-100 hover-shadow">
            <div class="card-body text-center p-5">
                <div class="display-1 mb-3">🛡️</div>
                <h3 class="card-title fw-bold">Conditions</h3>
                <p class="card-text text-muted">Track book conditions (Good, Damaged, Lost).</p>
                <a href="{{ route('book-conditions.index') }}" class="btn btn-danger w-100 stretched-link">Manage Conditions</a>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-shadow { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-shadow:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
</style>
@endsection
