@extends('layouts.app')

@section('content')
<h1 class="text-center mb-5">📚 Database Buku</h1>

{{-- Form Tambah Buku --}}
<div class="card mb-4">
    <div class="card-body p-4">
        <form action="{{ route('books.store') }}" method="POST" class="row g-3 align-items-end">
            @csrf
            <div class="col-md-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="e.g. Clean Code" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="e.g. Robert C. Martin" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control" placeholder="e.g. 2008" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    <option value="" disabled selected>Select Category...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-primary">➕ Add Book</button>
            </div>
        </form>
    </div>
</div>

{{-- Form Search --}}
<div class="card mb-4">
    <div class="card-body p-4">
        <form method="GET" action="{{ route('books.index') }}" class="row g-3 align-items-end">
            <div class="col-md-10">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by title or author..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-outline-primary">🔍 Search</button>
            </div>
        </form>
    </div>
</div>

{{-- Tabel Daftar Buku --}}
<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="ps-4">📖 Title</th>
                    <th>✍️ Author</th>
                    <th>📅 Year</th>
                    <th>📂 Category</th>
                    <th>🛠️ Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->year }}</td>
                        <td><span class="badge bg-secondary">{{ $book->category->name ?? 'Uncategorized' }}</span></td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">✏️ Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Are you sure you want to delete this book?')">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="text-center mt-4">
    <a href="{{ route('api.books') }}" class="btn btn-outline-secondary rounded-pill" target="_blank">🌐 View API JSON</a>
</div>
@endsection
