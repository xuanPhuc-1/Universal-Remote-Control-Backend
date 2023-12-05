<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <h1> <a href="/admin/dashboard">Admin Dashboard</a></h1>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                        </ul>
                </div>
                <div class="logo-element">
                    IOT
                </div>
            </li>
            <li class="active">
                <a href="/admin/dashboard"><i class="fa fa-user-circle-o"></i> <span class="nav-label">User Control
                        Panel</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('users.index') }}">User Management</a></li>
                    <li><a href="{{ route('admin.locations.index') }}">Room Management</a></li>
                </ul>
            </li>

            <li class="active">
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Device Control Panel</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.hubs.index') }}">Hub Management</a></li>
                    <li><a href="{{ route('admin.device-category.index') }}">Device Category Management</a></li>
                    <li><a href="{{ route('admin.devices.index') }}">Device Management</a></li>
                </ul>
            </li>

            <li class="active">
                <a href=""><i class="fa fa-database"></i> <span class="nav-label">System Logs Viewer</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.logs') }}">View Logs</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
