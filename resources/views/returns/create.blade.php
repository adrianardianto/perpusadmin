@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Process Book Return</h1>
            <a href="{{ route('returns.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('returns.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Select Active Borrowing</label>
                        <select name="borrowing_id" class="form-select" required>
                            @forelse($borrowings as $borrowing)
                                <option value="{{ $borrowing->id }}">
                                    {{ $borrowing->book->title }} ({{ $borrowing->member->name }}) - Due: {{ $borrowing->due_date }}
                                </option>
                            @empty
                                <option disabled>No active borrowings found</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Return Date</label>
                            <input type="date" name="return_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fine Amount (Rp)</label>
                            <input type="number" name="fine_amount" class="form-control" value="0" min="0">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="e.g. Book cover slightly damaged"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100" {{ $borrowings->isEmpty() ? 'disabled' : '' }}>
                        Confirm Return
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
