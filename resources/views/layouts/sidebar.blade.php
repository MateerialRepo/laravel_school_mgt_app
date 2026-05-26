<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
        <span class="brand-text">EduManage</span>
    </div>

    <nav class="sidebar-nav mt-3">
        <div class="nav-section-label">Main</div>
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="bi bi-grid-1x2-fill nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="nav-section-label mt-3">Students</div>
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('liststudents') ? 'active' : '' }}" href="{{ route('liststudents') }}">
                    <i class="bi bi-people-fill nav-icon"></i>
                    <span class="nav-text">All Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('addstudent') ? 'active' : '' }}" href="{{ route('addstudent') }}">
                    <i class="bi bi-person-plus-fill nav-icon"></i>
                    <span class="nav-text">Add Student</span>
                </a>
            </li>
        </ul>

        <div class="nav-section-label mt-3">Teachers</div>
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('listteachers') ? 'active' : '' }}" href="{{ route('listteachers') }}">
                    <i class="bi bi-person-workspace nav-icon"></i>
                    <span class="nav-text">All Teachers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('addteacher') ? 'active' : '' }}" href="{{ route('addteacher') }}">
                    <i class="bi bi-person-badge-fill nav-icon"></i>
                    <span class="nav-text">Add Teacher</span>
                </a>
            </li>
        </ul>

        <div class="nav-section-label mt-3">Account</div>
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-gear-fill nav-icon"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn sidebar-logout">
                <i class="bi bi-box-arrow-left nav-icon"></i>
                <span class="nav-text">Logout</span>
            </button>
        </form>
    </div>
</aside>
