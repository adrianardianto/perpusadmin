@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📤 Borrowings (Peminjaman)</h1>
    <a href="{{ route('borrowings.create') }}" class="btn btn-primary">➕ New Borrowing</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Member</th>
                    <th>Book</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th class="pe-4 text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrowings as $borrowing)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $borrowing->member->name }}</td>
                        <td>{{ $borrowing->book->title }}</td>
                        <td>{{ $borrowing->borrow_date }}</td>
                        <td>{{ $borrowing->due_date }}</td>
                        <td>
                            <span class="badge bg-{{ $borrowing->status == 'borrowed' ? 'warning' : 'success' }}">
                                {{ ucfirst($borrowing->status) }}
                            </span>
                        </td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete record?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-4 text-muted">No active borrowings.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
