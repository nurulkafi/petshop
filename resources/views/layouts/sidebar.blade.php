<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="assets/images/logo.svg" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item @yield('Dashboard') ">
                    <a href="index.html" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class='sidebar-title'>Auth</li>
                <li class="sidebar-item @yield('Users') ">
                    <a href="index.html" class='sidebar-link'>
                        <i data-feather="users" width="20"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item @yield('Roles') ">
                    <a href="{{ url('role') }}" class='sidebar-link'>
                        <i data-feather="lock" width="20"></i>
                        <span>Roles</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
