@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Return Record</h1>
            <a href="{{ route('returns.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('returns.update', $bookReturn) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label text-muted">Borrowing Info (Read Only)</label>
                        <input type="text" class="form-control bg-light" value="{{ $bookReturn->borrowing->book->title }} - {{ $bookReturn->borrowing->member->name }}" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Return Date</label>
                            <input type="date" name="return_date" class="form-control" value="{{ $bookReturn->return_date->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fine Amount (Rp)</label>
                            <input type="number" name="fine_amount" class="form-control" value="{{ $bookReturn->fine_amount }}" min="0">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="2">{{ $bookReturn->notes }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Return Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
