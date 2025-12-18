@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📂 Book Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">➕ New Category</a>
</div>

<div class="row">
    @forelse($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $category->name }}</h5>
                    <p class="card-text text-muted">{{ $category->description ?? 'No description.' }}</p>
                </div>
                <div class="card-footer bg-white border-top-0 d-flex justify-content-end">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-warning me-2">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center text-muted">No categories defined yet.</div>
    @endforelse
</div>
@endsection
