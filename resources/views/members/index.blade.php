@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>👥 Member List</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary">➕ Register Member</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th class="pe-4 text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>
                            <span class="badge bg-{{ $member->status == 'active' ? 'success' : 'danger' }}">
                                {{ ucfirst($member->status) }}
                            </span>
                        </td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-outline-warning me-1">✏️</a>
                            <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete member?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No members found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
