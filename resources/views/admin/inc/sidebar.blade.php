        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Users</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('courses.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Courses</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Courses Category</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('sections.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sections</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('lessons.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Lessons</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('comments.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Comment</span></a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('courses.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Payment</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('courses.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Wishlist</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
          

        </ul>
        <!-- End of Sidebar -->
