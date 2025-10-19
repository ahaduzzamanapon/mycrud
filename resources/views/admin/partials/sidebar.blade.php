<div class="sidebar-header">
    <h3>Admin Panel</h3>
</div>

<ul class="list-unstyled components">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="#hrmSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">HRM</a>
        <ul class="collapse list-unstyled" id="hrmSubmenu">
            <li>
                <a href="{{ route('admin.employees.index') }}">Employee List</a>
            </li>
            <li>
                <a href="#">Attendance</a>
            </li>
            <li>
                <a href="#">Reports</a>
            </li>
        </ul>
    </li>
    <!-- Other admin links can go here -->
</ul>
