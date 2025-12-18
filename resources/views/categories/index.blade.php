@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-down">
    <div>
        <h1 class="fw-bold mb-1">📂 Book Categories</h1>
        <p class="text-muted mb-0">Atur buku-buku Anda ke dalam genre dan tag yang mudah dicari.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus-circle"></i> New Category
    </a>
</div>

<div class="row g-4">
    @forelse($categories as $category)
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
            <div class="card h-100 category-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="category-icon bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-folder-open fa-lg"></i>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                <li><a class="dropdown-item" href="{{ route('categories.edit', $category) }}"><i class="fas fa-edit me-2 text-warning"></i> Edit</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="dropdown-item text-danger" onclick="return confirm('Delete this category?')"><i class="fas fa-trash-alt me-2"></i> Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2">{{ $category->name }}</h5>
                    <p class="text-muted mb-4 small">{{ Str::limit($category->description ?? 'No detailed description provided for this category.', 80) }}</p>
                    
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                        <span class="badge bg-light text-muted fw-normal px-3 py-2 rounded-pill">
                            <i class="fas fa-book me-1"></i> {{ $category->books_count ?? 0 }} Books
                        </span>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-link text-primary fw-bold text-decoration-none p-0">
                            Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12" data-aos="fade-up">
            <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                <div class="py-4">
                    <i class="fas fa-tags fa-3x text-light mb-3"></i>
                    <h5 class="text-muted">No categories defined yet.</h5>
                    <p class="text-muted small">Start by creating your first category to organize your library.</p>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mt-3">Create First Category</a>
                </div>
            </div>
        </div>
    @endforelse
</div>

<style>
    .bg-info-subtle { background-color: rgba(54, 185, 204, 0.1); }
    
    .category-card {
        border: 1px solid rgba(0,0,0,0.02);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    
    .category-card:hover {
        border-color: rgba(54, 185, 204, 0.3);
        background: linear-gradient(to bottom right, #ffffff, #f0fbff);
    }
    
    .category-icon {
        transition: all 0.3s ease;
    }
    
    .category-card:hover .category-icon {
        background-color: #36b9cc !important;
        color: white !important;
        transform: rotate(-10deg);
    }
</style>
@endsection
