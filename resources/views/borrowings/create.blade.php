@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>New Borrowing Transaction</h1>
            <a href="{{ route('borrowings.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Member</label>
                        <select name="member_id" class="form-select" required>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Book</label>
                        <select name="book_id" class="form-select" required>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} - {{ $book->author }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Borrow Date</label>
                            <input type="date" name="borrow_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control" value="{{ date('Y-m-d', strtotime('+7 days')) }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Confirm Borrowing</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
