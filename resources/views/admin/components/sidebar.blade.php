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
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="/admin/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('users.index') }}">Quản lý người dùng</a></li>
                    <li><a href="{{ route('admin.locations.index') }}">Quản lý phòng</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
