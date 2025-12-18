@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Book</h1>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="" disabled>Select Category...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
