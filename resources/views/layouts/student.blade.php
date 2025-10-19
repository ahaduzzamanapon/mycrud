<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')
</body>
</html>
