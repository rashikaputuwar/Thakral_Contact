<!DOCTYPE html>
<html>

<head>
    <title>CMS @yield('title')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex ">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                 
                </button>
                <div class="sidebar-logo">
                    <a href="#">CMS</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{Route('welcomePage')}}" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Contact</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{Route('employee.index')}}" class="sidebar-link">
                        <i class="lni lni-smile"></i>
                        <span>Employees</span>
                    </a>
                </li>
              
                <li class="sidebar-item">
                    <a href="" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#person-organization" aria-expanded="false" aria-controls="person-organization">
                        <i class="lni lni-briefcase"></i>
                        <span>Person/Organization</span>
                    </a>
                    <ul id="person-organization" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item dropdown-item">
                            <a href="{{Route('client.index')}}" class="sidebar-link">Organization Details</a>
                        </li>
                        <li class="sidebar-item dropdown-item">
                            <a href="{{Route('contactPerson.index')}}" class="sidebar-link">Contact Person Details</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                <a href="{{Route('visitor.showForm')}}" class="sidebar-link">
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
                        data-bs-target="#user-management" aria-expanded="false" aria-controls="user-management">
                        <i class="lni lni-users"></i>
                        <span>User Mgmt</span>
                    </a>
                    <ul id="user-management" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item dropdown-item">
                            <a href="{{route('show.User')}}" class="sidebar-link">User</a>
                        </li>
                        <li class="sidebar-item dropdown-item">
                            <a href="{{route('roles.index')}}" class="sidebar-link">Role</a>
                        </li>
                        <li class="sidebar-item dropdown-item">
                        <a href="{{Route('menu.index')}}" class="sidebar-link">Menu</a>
                        </li>
                        <li class="sidebar-item dropdown-item">
                            <a href="{{Route('rolesMenu.index')}}" class="sidebar-link">Role Menu</a>
                        </li>
                        <li class="sidebar-item dropdown-item">
                            <a href="" class="sidebar-link">User Role</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#configuration" aria-expanded="false" aria-controls="configurationn">
                        <i class="lni lni-cog"></i>
                        <span>Configuration</span>
                    </a>
                    <ul id="configuration" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item dropdown-item">
                            <a href="{{Route('designation.index')}}" class="sidebar-link">Designation</a>
                        </li>
                        <li class="sidebar-item dropdown-item">
                            <a href="{{Route('department.index')}}" class="sidebar-link">Department</a>
                        </li>
                        <li class="sidebar-item dropdown-item">
                            <a href="{{Route('button.index')}}"
                             class="sidebar-link">Permission</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <header class="header text-center">
                <h1>Contact Management</h1>
            </header>
            <div class="content p-3">
                <section>
                    @yield('content')
                </section>  
            </div>
        </div>

      

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>

<section>
    @yield('scripts')
</section>

</body>

</html>
    {{-- <script src="{{ asset('js/sidebar.js') }}"></script> --}}