
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Personal Task Tracker')</title>

    <link rel="stylesheet"
          href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}">
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center"
               href="{{ url('/dashboard') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="sidebar-brand-text mx-2">
                    Task Tracker
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Task Management</div>

            <li class="nav-item {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('tasks.index')}}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>My Tasks</span>
                </a>
            </li>

        </ul>
        <!-- End Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white
                            topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop"
                            class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <span class="text-gray-800">
                        Personal Task Tracker
                    </span>

                </nav>
                <!-- End Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Personal Task Tracker</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <!-- JavaScript -->
    <script src="{{ asset('sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
