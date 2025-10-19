<nav class="navbar navbar-expand-lg navbar-light bg-white px-4 py-3">
    <div class="container-fluid">
        <button class="btn btn-primary d-lg-none" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-left"></i>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://picsum.photos/40/40?random=3" alt="user" class="rounded-circle" width="40">
                        <span class="ml-2">{{ Auth::guard('student')->user()->name }}</span>
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
    </div>
</nav>
