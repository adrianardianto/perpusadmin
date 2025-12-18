@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-down">
    <div>
        <h1 class="fw-bold mb-1">📚 Book Catalog</h1>
        <p class="text-muted mb-0">Kelola dan atur koleksi buku perpustakaan Anda.</p>
    </div>
    <div class="text-end">
        <a href="{{ route('api.books') }}" class="btn btn-outline-secondary rounded-3" target="_blank">
            <i class="fas fa-code me-2"></i> API JSON
        </a>
    </div>
</div>

<div class="row g-4 mb-5">
    {{-- Form Tambah Buku --}}
    <div class="col-lg-8" data-aos="fade-right">
        <div class="card h-100">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="fw-bold mb-0"><i class="fas fa-plus-circle text-primary me-2"></i>Add New Catalog</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Book Title</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-heading text-muted"></i></span>
                            <input type="text" name="title" class="form-control border-light bg-light" placeholder="e.g. Clean Code" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Author</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-user-edit text-muted"></i></span>
                            <input type="text" name="author" class="form-control border-light bg-light" placeholder="e.g. Robert C. Martin" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Publish Year</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-calendar-alt text-muted"></i></span>
                            <input type="number" name="year" class="form-control border-light bg-light" placeholder="e.g. 2008" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Category</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-tags text-muted"></i></span>
                            <select name="category_id" class="form-select border-light bg-light" required>
                                <option value="" disabled selected>Select Category...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 d-grid">
                        <label class="form-label d-none d-md-block">&nbsp;</label>
                        <button type="submit" class="btn btn-primary py-2">
                            <i class="fas fa-save me-2"></i> Register Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Form Search --}}
    <div class="col-lg-4" data-aos="fade-left">
        <div class="card h-100">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="fw-bold mb-0"><i class="fas fa-search text-primary me-2"></i>Quick Search</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('books.index') }}" class="h-100 d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-3">Saring koleksi Anda berdasarkan kata kunci judul atau penulis.</p>
                        <input type="text" name="search" class="form-control border-light bg-light mb-3 p-3" placeholder="Search keywords..." value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="btn btn-outline-primary w-100 py-2 mt-auto">
                        <i class="fas fa-filter me-2"></i> Apply Filter
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Tabel Daftar Buku --}}
<div class="card border-0 overflow-hidden" data-aos="fade-up">
    <div class="card-header bg-white py-4 px-4 border-0 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0"><i class="fas fa-list text-primary me-2"></i>Collection List</h5>
        <span class="badge bg-primary-subtle text-primary py-2 px-3 rounded-pill">{{ count($books) }} Books Total</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 border-0 text-uppercase small fw-bold text-muted">Book Info</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Author</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted text-center">Year</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Category</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td class="ps-4 py-4">
                                <div class="d-flex align-items-center">
                                    <div class="catalog-icon bg-primary-subtle text-primary rounded-3 me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">{{ $book->title }}</h6>
                                        <span class="text-muted small">ISBN: --</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-medium text-dark">{{ $book->author }}</div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-normal px-3 py-2 rounded-2 border border-light-subtle">{{ $book->year }}</span>
                            </td>
                            <td>
                                @if($book->category)
                                    <span class="badge bg-info-subtle text-info px-3 py-2 rounded-pill fw-medium">
                                        <i class="fas fa-tag small me-1"></i> {{ $book->category->name }}
                                    </span>
                                @else
                                    <span class="badge bg-light text-muted px-3 py-2 rounded-pill fw-medium">Uncategorized</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm rounded-3">
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-white text-warning border-end" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-white text-danger border-0" onclick="return confirm('Delete this book effectively?')" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="py-4">
                                    <i class="fas fa-folder-open fa-3x text-light mb-3"></i>
                                    <h5 class="text-muted">No books found in this collection</h5>
                                    <p class="text-muted small">Try adjusting your search filters or add a new book.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .bg-primary-subtle { background-color: rgba(78, 115, 223, 0.1); }
    .bg-info-subtle { background-color: rgba(54, 185, 204, 0.1); }
    .btn-white { background: white; border: 1px solid #edf2f7; }
    .btn-white:hover { background: #f8fafc; color: inherit; }
    
    .table > :not(caption) > * > * {
        padding: 1rem 0.5rem;
    }
    
    .catalog-icon {
        transition: all 0.3s ease;
    }
    
    tr:hover .catalog-icon {
        transform: scale(1.1);
        background-color: var(--primary-color) !important;
        color: white !important;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.1);
        background-color: white !important;
    }
</style>
@endsection
