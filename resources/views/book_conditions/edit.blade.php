@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Condition Record</h1>
            <a href="{{ route('book-conditions.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('book-conditions.update', $bookCondition) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Book</label>
                        <select name="book_id" class="form-select" required>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ $bookCondition->book_id == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Condition</label>
                        <select name="condition" class="form-select" required>
                            <option value="baik" {{ $bookCondition->condition == 'baik' ? 'selected' : '' }}>Baik (Good)</option>
                            <option value="rusak ringan" {{ $bookCondition->condition == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan (Light Damage)</option>
                            <option value="rusak berat" {{ $bookCondition->condition == 'rusak berat' ? 'selected' : '' }}>Rusak Berat (Heavy Damage)</option>
                            <option value="hilang" {{ $bookCondition->condition == 'hilang' ? 'selected' : '' }}>Hilang (Lost)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Description / Notes</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $bookCondition->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
