@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Borrowing</h1>
            <a href="{{ route('borrowings.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('borrowings.update', $borrowing) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Member</label>
                        <select name="member_id" class="form-select" required>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ $borrowing->member_id == $member->id ? 'selected' : '' }}>
                                    {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Book</label>
                        <select name="book_id" class="form-select" required>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Borrow Date</label>
                            <input type="date" name="borrow_date" class="form-control" value="{{ $borrowing->borrow_date }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control" value="{{ $borrowing->due_date }}" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="borrowed" {{ $borrowing->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                            <option value="returned" {{ $borrowing->status == 'returned' ? 'selected' : '' }}>Returned</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Borrowing</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
