<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <h1>Admin</h1>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                        </ul>
                </div>
                <div class="logo-element">
                    IOT
                </div>
            </li>
            <li class="active">
                <a href="/admin/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">User Control
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
                    <li><a href="#">Hub Management</a></li>
                    <li><a href="#">Device Management</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
