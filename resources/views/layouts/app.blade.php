<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turning Point - Job Preparation Platform</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .header {
            background-color: #fff;
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header .logo {
            font-size: 28px;
            font-weight: bold;
            color: #e53935;
        }
        .header nav a {
            margin: 0 20px;
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 16px;
        }
        .header .btn {
            background-color: #e53935;
            color: #fff;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
        }
        .container {
            padding: 80px 40px;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 40px;
        }
        .footer-content {
            display: flex;
            justify-content: space-around;
        }
        .footer-section h4 {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .footer-section a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }
        .copyright {
            text-align: center;
            margin-top: 40px;
            color: #ccc;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="logo">Turning Point</div>
        <nav>
            <a href="/">Home</a>
            <a href="/courses">Courses</a>
            <a href="/books">Books</a>
            <a href="/about">About Us</a>
            <a href="/branches">Branches</a>
            <a href="/batch-schedule">Batch Schedule</a>
            <a href="/blogs">Blogs</a>
        </nav>
        <a href="/login" class="btn">Log in</a>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>About</h4>
                <a href="/about">About Us</a>
                <a href="#">Career</a>
                <a href="/branches">Branches</a>
            </div>
            <div class="footer-section">
                <h4>Support</h4>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Refund Policy</a>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p>Dhaka, Bangladesh</p>
                <p>[email protected]</p>
                <p>01713 28 91 49</p>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright © Turning Point 2025 || Developed by Ahaduzzaman</p>
        </div>
    </footer>

</body>
</html>