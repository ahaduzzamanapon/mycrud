<nav class="navbar navbar-expand-lg navbar-light bg-white px-4 py-3">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none" href="{{ route('student.dashboard') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Turning Point Logo" style="height: 40px;">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://picsum.photos/40/40?random=3" alt="user" class="rounded-circle" width="40">
                    <span class="ml-2 d-none d-lg-inline">{{ Auth::guard('student')->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('student.profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('student.settings') }}">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('student.logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
