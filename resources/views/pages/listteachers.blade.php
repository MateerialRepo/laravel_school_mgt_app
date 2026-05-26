@extends('layouts.dashboard')
@section('page_name', 'Teachers')

@section('content')
<div class="table-card">
    <div class="table-card-header">
        <div>
            <h6 class="fw-700 mb-0">All Teachers</h6>
            <small class="text-muted">Manage teaching staff</small>
        </div>
        <a href="{{ route('addteacher') }}" class="btn btn-primary-custom d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Add Teacher
        </a>
    </div>

    @if(session('status'))
        <div class="alert alert-success mx-4 mt-3 rounded-3 border-0" style="background:#f0fdf4;color:#166534">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('status') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Teacher</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $i => $teacher)
                <tr>
                    <td class="text-muted fw-500">{{ $i + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-table" style="background:linear-gradient(135deg,#10b981,#059669)">
                                {{ strtoupper(substr($teacher->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-600" style="font-size:.875rem">{{ $teacher->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-gender {{ $teacher->gender === 'male' ? 'badge-male' : ($teacher->gender === 'female' ? 'badge-female' : 'badge-others') }}">
                            {{ ucfirst($teacher->gender) }}
                        </span>
                    </td>
                    <td>{{ $teacher->phone }}</td>
                    <td class="text-muted">{{ $teacher->email }}</td>
                    <td class="text-muted" style="max-width:150px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $teacher->address }}</td>
                    <td class="text-center">
                        <a href="editteacher/{{ $teacher->user_id }}" class="btn btn-action btn-edit me-1">
                            <i class="bi bi-pencil-fill me-1"></i>Edit
                        </a>
                        <a href="deleteteacher/{{ $teacher->user_id }}" class="btn btn-action btn-delete"
                           onclick="return confirm('Delete this teacher?')">
                            <i class="bi bi-trash-fill me-1"></i>Delete
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="bi bi-person-workspace fs-2 d-block mb-2 opacity-25"></i>
                        No teachers found. <a href="{{ route('addteacher') }}">Add one now.</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
