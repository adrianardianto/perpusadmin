@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Record Book Condition</h1>
            <a href="{{ route('book-conditions.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('book-conditions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Select Book</label>
                        <select name="book_id" class="form-select" required>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->author }})</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Condition</label>
                        <select name="condition" class="form-select" required>
                            <option value="baik">Baik (Good)</option>
                            <option value="rusak ringan">Rusak Ringan (Light Damage)</option>
                            <option value="rusak berat">Rusak Berat (Heavy Damage)</option>
                            <option value="hilang">Hilang (Lost)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Description / Notes</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Describe the damage or details..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Save Condition Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
