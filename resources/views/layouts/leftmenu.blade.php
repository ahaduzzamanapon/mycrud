{{-- Dashboard --}}
<li class="nav-item">
    <a class="nav-link {!! Request::is('dashboard') ? 'active' : '' !!}" aria-current="page" href="{{ url('/dashboard') }}" >
        <i class="icon im im-icon-Home"></i>
        <span class="item-name">Dashboard</span>
    </a>
</li>

{{-- Users Management --}}
@if(can('user_management'))
<li class="nav-item">
    <a class="nav-link {!! (Request::is('users*') || Request::is('roleAndPermissions*') ? 'active' : '' ) !!}" data-bs-toggle="collapse" href="#users_menu" role="button" aria-expanded="false" aria-controls="users_menu">
        <i class="icon im im-icon-User"></i>
        <span class="item-name">Manage Users</span>
        <i class="right-icon im im-icon-Arrow-Right"></i>
    </a>
    <ul class="sub-nav collapse {!! (Request::is('users*') || Request::is('roleAndPermissions*') ? 'show' : '') !!}" id="users_menu" data-bs-parent="#sidebar-menu">
        @if(can('user'))
        <li class="nav-item">
            <a class="nav-link {!! Request::is('users*') ? 'active' : '' !!}" href="{{ route('users.index') }}">
                <i class="icon im im-icon-User"></i>
                <i class="sidenav-mini-icon"> U </i>
                <span class="item-name">Users</span>
            </a>
        </li>
        @endif
        @if(can('roll_and_permission'))
        <li class="nav-item">
            <a class="nav-link {!! Request::is('roleAndPermissions*') ? 'active' : '' !!}" href="{{ route('roleAndPermissions.index') }}">
                <i class="icon im im-icon-Security-Settings"></i>
                <i class="sidenav-mini-icon"> R </i>
                <span class="item-name">Role Management</span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

{{-- HRM --}}
<li class="nav-item">
    <a class="nav-link {!! (Request::is('admin/employees*') || Request::is('admin/attendance*')) ? 'active' : '' !!}" data-bs-toggle="collapse" href="#hrm_menu" role="button" aria-expanded="false" aria-controls="hrm_menu">
        <i class="icon im im-icon-Business-ManWoman"></i>
        <span class="item-name">HRM</span>
        <i class="right-icon im im-icon-Arrow-Right"></i>
    </a>
    <ul class="sub-nav collapse {!! (Request::is('admin/employees*') || Request::is('admin/attendance*')) ? 'show' : '' !!}" id="hrm_menu" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/employees*') ? 'active' : '' !!}" href="{{ route('admin.employees.index') }}">
                <i class="icon im im-icon-Business-Mens"></i>
                <span class="item-name">Employee List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/attendance/create') ? 'active' : '' !!}" href="{{ route('admin.attendance.create') }}">
                <i class="icon im im-icon-Clock-Forward"></i>
                <span class="item-name">Daily Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/attendance/report') ? 'active' : '' !!}" href="{{ route('admin.attendance.report') }}">
                <i class="icon im im-icon-File-Chart"></i>
                <span class="item-name">Attendance Report</span>
            </a>
        </li>
    </ul>
</li>

{{-- Accounts --}}
<li class="nav-item">
    <a class="nav-link {!! (Request::is('admin/ledgers*') || Request::is('admin/transactions*') || Request::is('admin/reports/accounts')) ? 'active' : '' !!}" data-bs-toggle="collapse" href="#accounts_menu" role="button" aria-expanded="false" aria-controls="accounts_menu">
        <i class="icon im im-icon-Money-2"></i>
        <span class="item-name">Accounts</span>
        <i class="right-icon im im-icon-Arrow-Right"></i>
    </a>
    <ul class="sub-nav collapse {!! (Request::is('admin/ledgers*') || Request::is('admin/transactions*') || Request::is('admin/reports/accounts')) ? 'show' : '' !!}" id="accounts_menu" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/ledgers*') ? 'active' : '' !!}" href="{{ route('admin.ledgers.index') }}">
                <i class="icon im im-icon-Book"></i>
                <span class="item-name">All Ledgers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/transactions/create') ? 'active' : '' !!}" href="{{ route('admin.transactions.create') }}">
                <i class="icon im im-icon-Add-File"></i>
                <span class="item-name">Add Transaction</span>
            </a>
        </li>
    </ul>
</li>

{{-- Student Management --}}
<li class="nav-item">
    <a class="nav-link {!! (Request::is('admin/courses*') || Request::is('admin/batches*') || Request::is('admin/students*') || Request::is('admin/reports/students') || Request::is('admin/enrollments*')) ? 'active' : '' !!}" data-bs-toggle="collapse" href="#student_mgmt_menu" role="button" aria-expanded="false" aria-controls="student_mgmt_menu">
        <i class="icon im im-icon-Student-MaleFemale"></i>
        <span class="item-name">Student Management</span>
        <i class="right-icon im im-icon-Arrow-Right"></i>
    </a>
    <ul class="sub-nav collapse {!! (Request::is('admin/courses*') || Request::is('admin/batches*') || Request::is('admin/students*') || Request::is('admin/reports/students') || Request::is('admin/enrollments*')) ? 'show' : '' !!}" id="student_mgmt_menu" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/students*') ? 'active' : '' !!}" href="{{ route('admin.students.index') }}">
                <i class="icon im im-icon-Business-Mens"></i>
                <span class="item-name">Student List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/enrolled-students') ? 'active' : '' !!}" href="{{ route('admin.students.enrolled_list') }}">
                <i class="icon im im-icon-Conference"></i>
                <span class="item-name">Enrolled Students</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/enrollments*') ? 'active' : '' !!}" href="{{ route('admin.enrollments.index') }}">
                <i class="icon im im-icon-Yes"></i>
                <span class="item-name">Enrollment Requests</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/courses*') ? 'active' : '' !!}" href="{{ route('admin.courses.index') }}">
                <i class="icon im im-icon-Books"></i>
                <span class="item-name">Courses</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/batches*') ? 'active' : '' !!}" href="{{ route('admin.batches.index') }}">
                <i class="icon im im-icon-Bar-Chart5"></i>
                <span class="item-name">Batches</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/reports/students') ? 'active' : '' !!}" href="{{ route('admin.reports.students') }}">
                <i class="icon im im-icon-File-Chart"></i>
                <span class="item-name">Student Report</span>
            </a>
        </li>
    </ul>
</li>

{{-- Exam Management --}}
<li class="nav-item">
    <a class="nav-link {!! Request::is('admin/mcqs*') ? 'active' : '' !!}" data-bs-toggle="collapse" href="#exam_mgmt_menu" role="button" aria-expanded="false" aria-controls="exam_mgmt_menu">
        <i class="icon im im-icon-File-Edit"></i>
        <span class="item-name">Exam Management</span>
        <i class="right-icon im im-icon-Arrow-Right"></i>
    </a>
    <ul class="sub-nav collapse {!! (Request::is('admin/mcqs*') || Request::is('admin/subjects*') || Request::is('admin/question_papers*') || Request::is('admin/exams*')) ? 'show' : '' !!}" id="exam_mgmt_menu" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/exams*') ? 'active' : '' !!}" href="{{ route('admin.exams.index') }}">
                <i class="icon im im-icon-Diploma"></i>
                <span class="item-name">Exams</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/question_papers*') ? 'active' : '' !!}" href="{{ route('admin.question_papers.index') }}">
                <i class="icon im im-icon-Align-Justify"></i>
                <span class="item-name">Question Paper List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/subjects*') ? 'active' : '' !!}" href="{{ route('admin.subjects.index') }}">
                <i class="icon im im-icon-Book-Open"></i>
                <span class="item-name">Subjects</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/question_papers/create') ? 'active' : '' !!}" href="{{ route('admin.question_papers.create') }}">
                <i class="icon im im-icon-Add-File"></i>
                <span class="item-name">Create Question Paper</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/question_papers/generate') ? 'active' : '' !!}" href="{{ route('admin.question_papers.generate_form') }}">
                <i class="icon im im-icon-Gear"></i>
                <span class="item-name">Generate Question Paper</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/mcqs*') ? 'active' : '' !!}" href="{{ route('admin.mcqs.index') }}">
                <i class="icon im im-icon-File-Favorite"></i>
                <span class="item-name">MCQs</span>
            </a>
        </li>
    </ul>
</li>
{{-- Settings --}}
@if(can('settings'))
<li class="nav-item">
    <a class="nav-link {!! (Request::is('siteSettings*') || Request::is('designations*') || Request::is('admin/payment_methods*')) ? 'active' : '' !!}" data-bs-toggle="collapse" href="#settings_menu" role="button" aria-expanded="false" aria-controls="settings_menu">
        <i class="icon im im-icon-Gear"></i>
        <span class="item-name">Settings</span>
        <i class="right-icon im im-icon-Arrow-Right"></i>
    </a>
    <ul class="sub-nav collapse {!! (Request::is('siteSettings*') || Request::is('designations*') || Request::is('termAndConditions*') || Request::is('companies*') || Request::is('locations*') || Request::is('accountLedgers*') || Request::is('customers*') || Request::is('suppliers*') || Request::is('admin/payment_methods*')) ? 'show' : '' !!}" id="settings_menu" data-bs-parent="#sidebar-menu">
        @if(can('site_settings'))
        <li class="nav-item">
            <a class="nav-link {!! Request::is('siteSettings*') ? 'active' : '' !!}" href="{{ route('siteSettings.index') }}">
                <i class="icon im im-icon-Settings-Window"></i>
                <i class="sidenav-mini-icon"> S </i>
                <span class="item-name">Site Settings</span>
            </a>
        </li>
        @endif
        @if(can('designations'))
        <li class="nav-item">
            <a class="nav-link {!! Request::is('designations*') ? 'active' : '' !!}" href="{{ route('designations.index') }}">
                <i class="icon im im-icon-Teacher"></i>
                <i class="sidenav-mini-icon"> D </i>
                <span class="item-name">Designations</span>
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link {!! Request::is('admin/payment_methods*') ? 'active' : '' !!}" href="{{ route('admin.payment_methods.index') }}">
                <i class="icon im im-icon-Credit-Card"></i>
                <span class="item-name">Payment Methods</span>
            </a>
        </li>
        {{-- Add other settings items here --}}
    </ul>
</li>
@endif
