<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
        }
        .wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #fff;
            color: #333;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .sidebar-header {
            padding: 20px;
            background: #e53935;
            color: #fff;
            text-align: center;
        }
        .sidebar-header h3 {
            font-size: 22px;
            margin: 0;
            font-weight: 600;
        }
        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #f4f7f6;
        }
        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }
        #sidebar ul li a {
            padding: 15px 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
            color: #555;
            transition: all 0.3s;
            text-decoration: none;
        }
        #sidebar ul li a:hover {
            color: #e53935;
            background: #f4f7f6;
        }
        #sidebar ul li.active > a, a[aria-expanded="true"] {
            color: #e53935;
            background: #fce4ec;
        }
        #sidebar ul li a svg {
            margin-right: 15px;
            min-width: 24px;
        }
        #content {
            width: 100%;
            padding: 40px;
        }
        .card-dashboard {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-dashboard:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        .card-dashboard h4 {
            font-weight: 500;
            color: #888;
        }
        .card-dashboard .display-4 {
            font-weight: 700;
            color: #e53935;
        }
        .chart-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            margin-top: 40px;
        }

        .bottom-navbar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: #fff;
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .bottom-navbar .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #555;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .bottom-navbar .nav-item.active,
        .bottom-navbar .nav-item:hover {
            color: #e53935;
        }
        .bottom-navbar .nav-item.active {
            border-top: 2px solid #e53935;
        }
        .bottom-navbar .nav-item i {
            font-size: 20px;
            margin-bottom: 5px;
        }
        .bottom-navbar .nav-item span {
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .wrapper {
                display: block;
            }
            #sidebar {
                display: none;
            }
            #content {
                width: 100%;
                padding: 20px;
                padding-bottom: 80px;
            }
            .card-dashboard {
                padding: 20px;
            }
            .card-dashboard h4 {
                font-size: 1rem;
            }
            .card-dashboard .display-4 {
                font-size: 2.5rem;
            }

        }
    </style>
</head>
<body>

<div class="wrapper">
    <nav id="sidebar">
        @include('student.partials.sidebar')
    </nav>

    <div id="content">
        @include('student.partials.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>

<div class="bottom-navbar d-lg-none">
    <a href="{{ route('student.dashboard') }}" class="nav-item {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('student.courses') }}" class="nav-item {{ request()->routeIs('student.courses') ? 'active' : '' }}">
        <i class="fas fa-book"></i>
        <span>Courses</span>
    </a>
    <a href="{{ route('student.exams.index') }}" class="nav-item {{ request()->routeIs('student.exams.index') ? 'active' : '' }}">
        <i class="fas fa-file-text"></i>
        <span>Exams</span>
    </a>
    <a href="{{ route('student.profile') }}" class="nav-item {{ request()->routeIs('student.profile') ? 'active' : '' }}">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')
</body>
</html>
