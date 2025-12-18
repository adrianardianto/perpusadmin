@extends('layouts.app')

@section('content')
<div class="row mb-5 align-items-center" data-aos="fade-up">
    <div class="col-lg-6">
        <h6 class="text-primary fw-bold text-uppercase mb-2">Ruang Kerja</h6>
        <h1 class="display-5 fw-bold mb-4">Selamat Datang di <span class="text-primary">Sistem Admin Perpustakaan</span></h1>
        <p class="lead text-muted mb-4">Kelola koleksi perpustakaan Anda, lacak peminjaman, dan pelihara data anggota dengan platform administrasi modern kami.</p>

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


<h2 class="fw-bold mb-4" data-aos="fade-right">Akses Cepat</h2>

<div class="row g-4">
    <!-- Books Card -->
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="card h-100 action-card overflow-hidden">
            <div class="card-body p-4">
                <div class="icon-box bg-primary text-white mb-4 rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-book fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-3">Books</h3>
                <p class="text-muted mb-4">Kelola berbagai koleksi perpustakaan Anda, tambah entri baru, atau perbarui data yang ada.</p>
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
                <p class="text-muted mb-4">Jaga agar buku Anda tetap terorganisir berdasarkan genre, penulis, atau tag khusus lainnya.</p>
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
                <p class="text-muted mb-4">Kelola daftar anggota perpustakaan yang diperbarui dan informasi kontak mereka.</p>
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
                <h3 class="fw-bold mb-3">Borrowings</h3>
                <p class="text-muted mb-4">Lacak pergerakan buku, proses peminjaman baru, dan pantau item yang dikembalikan.</p>
                <a href="{{ route('borrowings.index') }}" class="btn btn-outline-warning w-100 stretched-link">Manage Borrowings</a>
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
                <p class="text-muted mb-4">Proses pengembalian buku secara efisien dan hitung status atau denda potensial.</p>
                <a href="{{ route('returns.index') }}" class="btn btn-outline-secondary w-100 stretched-link">Manage Returns</a>
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
                <h3 class="fw-bold mb-3">Conditions</h3>
                <p class="text-muted mb-4">Pantau dan perbarui kondisi fisik setiap buku dalam koleksi Anda secara berkala.</p>
                <a href="{{ route('book-conditions.index') }}" class="btn btn-outline-danger w-100 stretched-link">Manage Conditions</a>
            </div>
        </div>
    </div>
</div>

<style>

    
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
