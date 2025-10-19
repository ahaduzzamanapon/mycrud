<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turning Point - Job Preparation Platform</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #fdfdfd;
            color: #333;
        }
        .header {
            background-color: #fff;
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .header .logo {
            font-size: 28px;
            font-weight: 700;
            color: #e53935;
        }
        .header nav a {
            margin: 0 20px;
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s ease;
        }
        .header nav a:hover {
            color: #e53935;
        }
        .header .btn {
            background-color: #e53935;
            color: #fff;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .header .btn:hover {
            background-color: #c62828;
        }
        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/2.jpg') }}');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 120px 20px;
            color: #fff;
        }
        .hero h1 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 20px;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .hero .btn {
            background-color: #e53935;
            color: #fff;
            padding: 15px 35px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .hero .btn:hover {
            background-color: #c62828;
        }
        .courses {
            padding: 80px 40px;
            background-color: #fff;
        }
        .courses h2 {
            text-align: center;
            font-size: 38px;
            font-weight: 600;
            margin-bottom: 60px;
        }
        .course-categories {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }
        .category {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            width: 220px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .category:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .category .icon {
            font-size: 48px;
            line-height: 1;
            margin-bottom: 20px;
        }
        .category h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .reviews {
            padding: 80px 40px;
            background-color: #f9f9f9;
            overflow: hidden; /* Fix for horizontal scrollbar */
        }
        .reviews h2 {
            text-align: center;
            font-size: 38px;
            font-weight: 600;
            margin-bottom: 60px;
        }
        .review-slider {
            max-width: 800px;
            margin: 0 auto;
        }
        .review {
            text-align: center;
            padding: 40px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
        }
        .review img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .review .stars {
            color: #ffc107;
            margin-bottom: 15px;
        }
        .review p {
            font-style: italic;
            color: #555;
            line-height: 1.8;
        }
        .review .author {
            font-weight: 600;
            margin-top: 20px;
            color: #333;
        }
        .footer {
            background-color: #222;
            color: #fff;
            padding: 60px 40px;
        }
        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }
        .footer-section h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .footer-section a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }
        .footer-section a:hover {
            color: #e53935;
        }
        .copyright {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #444;
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
        @if(Auth::guard('web')->check() || Auth::guard('student')->check())
            <a href="#" class="btn" onclick="event.preventDefault(); document.getElementById('logout-form-welcome').submit();">Logout</a>
            <form id="logout-form-welcome" action="{{ Auth::guard('web')->check() ? route('logout') : route('student.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('student.login') }}" class="btn">Student Portal</a>
        @endif
    </header>

    <section class="hero">
        <h1>Turning Point Learning Platform</h1>
        <p>বিসিএস, ব্যাংক ও সরকারি চাকরির প্রস্তুতির জন্য বাংলাদেশের প্রথম অনলাইন ও অফলাইন প্ল্যাটফর্ম।</p>
        <a href="{{ route('student.register') }}" class="btn">Get Started</a>
    </section>

    <section class="courses">
        <h2>All Courses</h2>
        <div class="course-categories">
            <div class="category">
                <div class="icon">🏦</div>
                <h3>Bank Job Preparation</h3>
            </div>
            <div class="category">
                <div class="icon">🎓</div>
                <h3>MBA Admission</h3>
            </div>
            <div class="category">
                <div class="icon">🏫</div>
                <h3>PRIMARY & NTRCA</h3>
            </div>
            <div class="category">
                <div class="icon">🌐</div>
                <h3>E-Language</h3>
            </div>
            <div class="category">
                <div class="icon">🏛️</div>
                <h3>BCS Preparation</h3>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h2>Student's Review</h2>
        <div class="swiper-container review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="review">
                        <img src="https://picsum.photos/100/100?random=1" alt="Reviewer">
                        <div class="stars">★★★★★</div>
                        <p>"Turning Point is the Pioneer and the most effective coaching centre for upgrading any job seekers career..."</p>
                        <div class="author">- Mahmood Ibn Bhuiyan</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="review">
                        <img src="https://picsum.photos/100/100?random=2" alt="Reviewer">
                        <div class="stars">★★★★★</div>
                        <p>"লক্ষ্য পূরণ করার জার্নিটা শুরু হয় ২০১৩ সালে, ঢাকায় যাই BCS Coaching করার জন্য, Exam দেই But Output Zero..."</p>
                        <div class="author">- Popy Talpatra</div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

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

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.review-slider', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },
        });
    </script>

</body>
</html>