@extends('layouts.app')

@section('content')
<div class="row mb-5 align-items-center" data-aos="fade-up">
    <div class="col-lg-6">
        <h6 class="text-primary fw-bold text-uppercase mb-2">Workspace</h6>
        <h1 class="display-5 fw-bold mb-4">Welcome to Library <span class="text-primary">Admin System</span></h1>
        <p class="lead text-muted mb-4">Kelola koleksi perpustakaan Anda, lacak peminjaman, dan pelihara data anggota dengan platform administrasi modern kami.</p>
        <div class="d-flex gap-3">
            <a href="{{ route('books.index') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> New Catalog
            </a>
            <a href="{{ route('borrowings.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-semibold">
                View Reports
            </a>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block text-center">
        <div class="position-relative">
            <div class="illustration-box py-5">
                <i class="fas fa-book-reader text-primary opacity-25" style="font-size: 12rem;"></i>
                <div class="floating-icons">
                    <i class="fas fa-book position-absolute text-primary opacity-50" style="top: 10%; right: 20%; font-size: 2rem;"></i>
                    <i class="fas fa-bookmark position-absolute text-warning opacity-50" style="bottom: 20%; left: 15%; font-size: 1.5rem;"></i>
                    <i class="fas fa-feather-alt position-absolute text-info opacity-50" style="top: 30%; left: 10%; font-size: 1.8rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .illustration-box {
        background: radial-gradient(circle, rgba(78, 115, 223, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
        border-radius: 50%;
    }
    .floating-icons i {
        animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
</style>

<!-- Stats Section -->
<div class="row g-4 mb-5">
    <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card border-0 bg-white">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-primary-subtle text-primary p-3 rounded-3">
                        <i class="fas fa-book-open fa-lg"></i>
                    </div>
                </div>
                <h4 class="fw-bold mb-1">Catalog</h4>
                <p class="text-muted small mb-0">Total Books</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="card border-0 bg-white">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-success-subtle text-success p-3 rounded-3">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                </div>
                <h4 class="fw-bold mb-1">Members</h4>
                <p class="text-muted small mb-0">Active Users</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="card border-0 bg-white">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-warning-subtle text-warning p-3 rounded-3">
                        <i class="fas fa-hand-holding fa-lg"></i>
                    </div>
                </div>
                <h4 class="fw-bold mb-1">Loans</h4>
                <p class="text-muted small mb-0">On Borrow</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="card border-0 bg-white">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-danger-subtle text-danger p-3 rounded-3">
                        <i class="fas fa-clock fa-lg"></i>
                    </div>
                </div>
                <h4 class="fw-bold mb-1">Overdue</h4>
                <p class="text-muted small mb-0">Unreturned</p>
            </div>
        </div>
    </div>
</div>

<h2 class="fw-bold mb-4" data-aos="fade-right">Quick Access</h2>

<div class="row g-4">
    <!-- Books Card -->
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="card h-100 action-card overflow-hidden">
            <div class="card-body p-4">
                <div class="icon-box bg-primary text-white mb-4 rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-book fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-3">Books</h3>
                <p class="text-muted mb-4">Manage your vast library collection, add new entries, or update existing records.</p>
                <a href="{{ route('books.index') }}" class="btn btn-outline-primary w-100 stretched-link">Manage Books</a>
            </div>
        </div>
    </div>

    <!-- Categories Card -->
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card h-100 action-card overflow-hidden">
            <div class="card-body p-4">
                <div class="icon-box bg-info text-white mb-4 rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-folder fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-3">Categories</h3>
                <p class="text-muted mb-4">Keep your books organized by genre, author, or any custom tags you need.</p>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-info w-100 stretched-link">Manage Categories</a>
            </div>
        </div>
    </div>

    <!-- Members Card -->
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="card h-100 action-card overflow-hidden">
            <div class="card-body p-4">
                <div class="icon-box bg-success text-white mb-4 rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-users-cog fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-3">Members</h3>
                <p class="text-muted mb-4">Maintain updated list of library members and their contact information.</p>
                <a href="{{ route('members.index') }}" class="btn btn-outline-success w-100 stretched-link">Manage Members</a>
            </div>
        </div>
    </div>

    <!-- Borrowings Card -->
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="card h-100 action-card overflow-hidden">
            <div class="card-body p-4">
                <div class="icon-box bg-warning text-white mb-4 rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-exchange-alt fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-3">Transactions</h3>
                <p class="text-muted mb-4">Track book movement, process new loans, and keep an eye on returned items.</p>
                <a href="{{ route('borrowings.index') }}" class="btn btn-outline-warning w-100 stretched-link">Transaction Hub</a>
            </div>
        </div>
    </div>

    <!-- Returns Card -->
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="500">
        <div class="card h-100 action-card overflow-hidden">
            <div class="card-body p-4">
                <div class="icon-box bg-secondary text-white mb-4 rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-undo-alt fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-3">Returns</h3>
                <p class="text-muted mb-4">Efficiently process book returns and calculate status or potential fines.</p>
                <a href="{{ route('returns.index') }}" class="btn btn-outline-secondary w-100 stretched-link">Process Returns</a>
            </div>
        </div>
    </div>

    <!-- Book Conditions Card -->
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="600">
        <div class="card h-100 action-card overflow-hidden">
            <div class="card-body p-4">
                <div class="icon-box bg-danger text-white mb-4 rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-clipboard-check fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-3">Audit</h3>
                <p class="text-muted mb-4">Monitor and update the physical condition of every book in your collection.</p>
                <a href="{{ route('book-conditions.index') }}" class="btn btn-outline-danger w-100 stretched-link">Run Audit</a>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-primary-subtle { background-color: rgba(78, 115, 223, 0.1); }
    .bg-success-subtle { background-color: rgba(28, 200, 138, 0.1); }
    .bg-warning-subtle { background-color: rgba(246, 194, 62, 0.1); }
    .bg-danger-subtle { background-color: rgba(231, 74, 59, 0.1); }
    
    .action-card {
        border: 1px solid rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    
    .action-card:hover {
        border-color: var(--primary-color);
        background: linear-gradient(to bottom right, #ffffff, #f8f9ff);
    }
    
    .icon-box {
        transition: all 0.3s ease;
    }
    
    .action-card:hover .icon-box {
        transform: rotate(-10deg) scale(1.1);
    }
</style>
@endsection
