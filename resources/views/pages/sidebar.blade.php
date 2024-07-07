<!DOCTYPE html>
<html>

<head>
    <title>CMS @yield('title')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                 
                </button>
                <div class="sidebar-logo">
                    <a href="#">CMS</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Contact</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="lni lni-smile"></i>
                        <span>Employees</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="lni lni-customer"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="lni lni-customer"></i>
                        <span>Visitors</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="lni lni-network"></i>
                        <span>Department</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-users"></i>
                        <span>User Mgmt</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapsed " data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('show.User')}}" class="sidebar-link">User</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('roles.index')}}" class="sidebar-link">Role</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link">Menu</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link">Role_Menu</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link">User_Role</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
                <h1>Contact Management</h1>
            </div>

            <section>
            @yield('content')
            </section>  
        </div>

    </div>

</body>

</html>
    <script src="{{ asset('js/sidebar.js') }}"></script>