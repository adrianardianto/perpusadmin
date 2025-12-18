@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📥 Returns & Fines</h1>
    <a href="{{ route('returns.create') }}" class="btn btn-success">➕ Process Return</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Member</th>
                    <th>Book</th>
                    <th>Returned On</th>
                    <th>Fine</th>
                    <th>Notes</th>
                    <th class="pe-4 text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($returns as $return)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $return->borrowing->member->name }}</td>
                        <td>{{ $return->borrowing->book->title }}</td>
                        <td>{{ $return->return_date }}</td>
                        <td class="{{ $return->fine_amount > 0 ? 'text-danger fw-bold' : 'text-success' }}">
                            Rp {{ number_format($return->fine_amount, 0, ',', '.') }}
                        </td>
                        <td>{{ $return->notes ?? '-' }}</td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('returns.edit', $return) }}" class="btn btn-sm btn-outline-warning me-1">✏️</a>
                            <form action="{{ route('returns.destroy', $return) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this record?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-4 text-muted">No returns recorded yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
