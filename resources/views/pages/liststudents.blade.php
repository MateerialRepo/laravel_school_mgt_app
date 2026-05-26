@extends('layouts.dashboard')
@section('page_name', 'Students')

@section('content')
<div class="table-card">
    <div class="table-card-header">
        <div>
            <h6 class="fw-700 mb-0">All Students</h6>
            <small class="text-muted">Manage enrolled students</small>
        </div>
        <a href="{{ route('addstudent') }}" class="btn btn-primary-custom d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Add Student
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
                    <th>Student</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $i => $student)
                <tr>
                    <td class="text-muted fw-500">{{ $i + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-table">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                            <div>
                                <div class="fw-600" style="font-size:.875rem">{{ $student->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-gender {{ $student->gender === 'male' ? 'badge-male' : ($student->gender === 'female' ? 'badge-female' : 'badge-others') }}">
                            {{ ucfirst($student->gender) }}
                        </span>
                    </td>
                    <td>{{ $student->phone }}</td>
                    <td class="text-muted" style="max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $student->address }}</td>
                    <td class="text-center">
                        <a href="editstudent/{{ $student->user_id }}" class="btn btn-action btn-edit me-1">
                            <i class="bi bi-pencil-fill me-1"></i>Edit
                        </a>
                        <a href="deletestudent/{{ $student->user_id }}" class="btn btn-action btn-delete"
                           onclick="return confirm('Delete this student?')">
                            <i class="bi bi-trash-fill me-1"></i>Delete
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-people fs-2 d-block mb-2 opacity-25"></i>
                        No students found. <a href="{{ route('addstudent') }}">Add one now.</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
