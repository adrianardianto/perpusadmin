@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Category</h1>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Description (Optional)</label>
                        <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
