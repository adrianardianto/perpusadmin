@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>🛡️ Book Conditions</h1>
    <a href="{{ route('book-conditions.create') }}" class="btn btn-primary">➕ Record Condition</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Book Title</th>
                    <th>Condition</th>
                    <th>Description</th>
                    <th>Recorded On</th>
                    <th class="pe-4 text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($conditions as $condition)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $condition->book->title }}</td>
                        <td>
                            <span class="badge 
                                {{ $condition->condition == 'baik' ? 'bg-success' : '' }}
                                {{ $condition->condition == 'rusak ringan' ? 'bg-warning' : '' }}
                                {{ $condition->condition == 'rusak berat' ? 'bg-danger' : '' }}
                                {{ $condition->condition == 'hilang' ? 'bg-dark' : '' }}
                            ">
                                {{ ucfirst($condition->condition) }}
                            </span>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($condition->description, 50) }}</td>
                        <td>{{ $condition->created_at->format('d M Y') }}</td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('book-conditions.edit', $condition) }}" class="btn btn-sm btn-outline-warning me-1">✏️</a>
                            <form action="{{ route('book-conditions.destroy', $condition) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this record?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No conditions recorded yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
