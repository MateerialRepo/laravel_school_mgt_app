@extends('layouts.dashboard')
@section('page_name', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background:#eff6ff">
                    <i class="bi bi-people-fill" style="color:#3b82f6"></i>
                </div>
                <span class="badge" style="background:#eff6ff;color:#3b82f6;font-size:.72rem">Total</span>
            </div>
            <div class="stat-value" style="color:#1e293b">—</div>
            <div class="stat-label mt-1">Students Enrolled</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background:#f0fdf4">
                    <i class="bi bi-person-workspace" style="color:#10b981"></i>
                </div>
                <span class="badge" style="background:#f0fdf4;color:#10b981;font-size:.72rem">Total</span>
            </div>
            <div class="stat-value" style="color:#1e293b">—</div>
            <div class="stat-label mt-1">Teachers on Staff</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background:#fdf4ff">
                    <i class="bi bi-journal-bookmark-fill" style="color:#a855f7"></i>
                </div>
                <span class="badge" style="background:#fdf4ff;color:#a855f7;font-size:.72rem">Active</span>
            </div>
            <div class="stat-value" style="color:#1e293b">—</div>
            <div class="stat-label mt-1">Classes Running</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background:#fff7ed">
                    <i class="bi bi-calendar-check-fill" style="color:#f59e0b"></i>
                </div>
                <span class="badge" style="background:#fff7ed;color:#f59e0b;font-size:.72rem">Today</span>
            </div>
            <div class="stat-value" style="color:#1e293b">{{ date('d M') }}</div>
            <div class="stat-label mt-1">{{ date('l') }}</div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card p-0">
            <div class="card-body p-4">
                <h6 class="fw-700 mb-1">Welcome back, {{ Auth::user()->name }} 👋</h6>
                <p class="text-muted mb-4" style="font-size:.875rem">Here's what's happening at your school today.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('addstudent') }}" class="btn btn-primary-custom d-inline-flex align-items-center gap-2">
                        <i class="bi bi-person-plus-fill"></i> Add Student
                    </a>
                    <a href="{{ route('addteacher') }}" class="btn d-inline-flex align-items-center gap-2"
                       style="background:#f8fafc;border:1px solid #e2e8f0;color:#334155;border-radius:9px;padding:10px 20px;font-weight:600;font-size:.875rem">
                        <i class="bi bi-person-badge-fill"></i> Add Teacher
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card p-0 h-100">
            <div class="card-body p-4">
                <h6 class="fw-700 mb-3">Quick Links</h6>
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('liststudents') }}" class="d-flex align-items-center gap-3 p-2 rounded-3 text-decoration-none" style="background:#f8fafc;color:#334155;font-size:.875rem;font-weight:500">
                        <i class="bi bi-people-fill" style="color:#6366f1"></i> View All Students
                    </a>
                    <a href="{{ route('listteachers') }}" class="d-flex align-items-center gap-3 p-2 rounded-3 text-decoration-none" style="background:#f8fafc;color:#334155;font-size:.875rem;font-weight:500">
                        <i class="bi bi-person-workspace" style="color:#10b981"></i> View All Teachers
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
