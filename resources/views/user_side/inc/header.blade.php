<!--::header part start::-->
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ '/home' }}">
                    <img src="{{ asset('user_side/img/logo.png') }}" alt="logo" id="logo_header">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse main-menu-item justify-content-end"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ '/home' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/aboutus' }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/courses' }}">Courses</a>
                        </li>

                        <!-- إخفاء رابط المفضلة إذا لم يكن المستخدم مسجل الدخول -->
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ '/favorites' }}">Favourite</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/contact' }}">Contact</a>
                        </li>

                        @if(Auth::check())
                            <!-- عندما يكون المستخدم مسجلاً -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('user_side/img/user_icon.png') }}" alt="User Icon" class="user-icon" width="30px" height="auto">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu m-1" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ '/profile' }}">Profile</a>
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <!-- عندما يكون المستخدم غير مسجل -->
                            <li class="d-none d-lg-block">
                                <a class="btn_1" href="{{ '/login' }}">Login</a>
                            </li>
                            <li class="d-none d-lg-block">
                                <a class="btn_1 btn_register" href="{{ '/register' }}">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header part end -->