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
        .hero {
            background-color: #fce4ec;
            text-align: center;
            padding: 80px 20px;
        }
        .hero h1 {
            font-size: 42px;
            margin-bottom: 20px;
            color: #333;
        }
        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #555;
        }
        .hero .btn {
            background-color: #e53935;
            color: #fff;
            padding: 15px 35px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }
        .courses {
            padding: 80px 40px;
            background-color: #fff;
        }
        .courses h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
        }
        .course-categories {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .category {
            background-color: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 30px;
            width: 200px;
            text-align: center;
        }
        .category .icon {
            font-size: 48px;
            color: #e53935;
            margin-bottom: 20px;
        }
        .category h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .reviews {
            padding: 80px 40px;
        }
        .reviews h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
        }
        .review-slider {
            max-width: 800px;
            margin: 0 auto;
        }
        .review {
            text-align: center;
            padding: 20px;
        }
        .review p {
            font-style: italic;
            color: #555;
        }
        .review .author {
            font-weight: bold;
            margin-top: 10px;
            color: #333;
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

    <section class="hero">
        <h1>Turning Point Learning Platform</h1>
        <p>বিসিএস, ব্যাংক ও সরকারি চাকরির প্রস্তুতির জন্য বাংলাদেশের প্রথম অনলাইন ও অফলাইন প্ল্যাটফর্ম।</p>
        <a href="/register" class="btn">শেখা শুরু করুন</a>
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
                <div class="swiper-slide review">
                    <p>"Turning Point is the Pioneer and the most effective coaching centre for upgrading any job seekers career..."</p>
                    <div class="author">- Mahmood Ibn Bhuiyan</div>
                </div>
                <div class="swiper-slide review">
                    <p>"লক্ষ্য পূরণ করার জার্নিটা শুরু হয় ২০১৩ সালে, ঢাকায় যাই BCS Coaching করার জন্য, Exam দেই But Output Zero..."</p>
                    <div class="author">- Popy Talpatra</div>
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