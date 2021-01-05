
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link sidebar-heading" href="{{route('home')}}">
            <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('liststudents')}}">
            <span data-feather="file"></span>
            All Student
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('addstudent')}}">
            <span data-feather="shopping-cart"></span>
            Create Student
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('listteachers')}}">
            <span data-feather="users"></span>
            All Teachers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('addteacher')}}">
            <span data-feather="bar-chart-2"></span>
            Create Teacher
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Edit Profile
          </a>
        </li>
      </ul>
    </div>
  </nav>