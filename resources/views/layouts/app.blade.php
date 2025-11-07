<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turning Point - Job Preparation Platform</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link
            href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&amp;family=Poppins:wght@400;500;600;700&amp;display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/custom-cards.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-course-details.css') }}">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary-color: #e53935;
            --secondary-color: #fce4ec;
            --text-color: #333;
            --light-text-color: #555;
            --bg-light: #fdfdfd;
            --bg-gray: #f9f9f9;
            --shadow-light: 0 4px 15px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 10px 30px rgba(0, 0, 0, 0.07);
            --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Hind Siliguri', 'Poppins', sans-serif;

            margin: 0;
            background-color: var(--bg-light);
            color: var(--text-color);
            line-height: 1.6;
        }

        section {
            padding: 80px 0;
            overflow: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header {
            background-color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-light);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary-color);
            text-decoration: none;
        }

        .header nav {
            display: flex;
            gap: 30px;
        }

        .header nav .nav-link {
            text-decoration: none;
            color: var(--light-text-color);
            font-weight: 700;
            font-size: 23px;
            transition: color 0.3s ease;
        }

        .header nav .nav-link:hover {
            color: var(--primary-color);
        }

        .header .btn {
            background-color: var(--primary-color);
            color: #fff;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .header .btn:hover {
            background-color: #c62828;
            transform: translateY(-2px);
        }

        .hamburger-menu {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .hamburger-menu .bar {
            width: 25px;
            height: 3px;
            background-color: var(--text-color);
            transition: all 0.3s ease-in-out;
        }

        .mobile-nav {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            box-shadow: var(--shadow-light);
            padding: 10px 0;
            z-index: 999;
        }

        .mobile-nav a {
            display: block;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            color: var(--light-text-color);
            transition: background-color 0.3s ease;
        }

        .mobile-nav a:hover {
            background-color: var(--secondary-color);
        }

        .hero-section {
            padding: 60px 0;
        }

        .promotion-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-medium);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .promotion-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .promotion-card img {
            width: 70%;
            height: auto;
        }

        .promotion-card .card-body {
            padding: 25px;
        }

        .promotion-card .btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        .marquee-container {
            background-color: var(--primary-color);
            color: #fff;
            padding: 10px 0;
            white-space: nowrap;
            overflow: hidden;
        }

        .marquee-text {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 20s linear infinite;
            font-size: 30px;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .section-title {
            text-align: center;
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 60px;
            color: var(--primary-color);
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .why-choose-us .card {
            border: none;
            border-radius: 15px;
            box-shadow: var(--shadow-medium);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .why-choose-us .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .why-choose-us .card-body {
            padding: 40px;
        }

        .why-choose-us .card-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .why-choose-us .card-text {
            font-size: 1.1rem;
            color: var(--light-text-color);
        }

        .why-choose-us .fa-3x {
            font-size: 3.5rem;
            color: var(--primary-color);
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
            width: 250px;
            text-align: center;
            box-shadow: var(--shadow-medium);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .category:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .category .icon {
            font-size: 3.5rem;
            line-height: 1;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .category h3 {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .category-button {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .category-button:hover {
            text-decoration: none;
            color: #fff;
            transform: scale(1.1);
        }

        .upcoming-batches .card {
            border: none;
            border-radius: 15px;
            box-shadow: var(--shadow-medium);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .upcoming-batches .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .upcoming-batches .card-body {
            padding: 25px;
        }

        .upcoming-batches .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .upcoming-batches .card-text {
            font-size: 0.95rem;
            color: var(--light-text-color);
            margin-bottom: 8px;
        }

        .upcoming-batches .btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: background-color 0.3s ease;
        }

        .upcoming-batches .btn:hover {
            background-color: #c62828;
            border-color: #c62828;
        }

        .reviews {
            background-color: var(--bg-gray);
        }

        .review-slider {
            max-width: 900px;
            margin: 0 auto;
        }

        .review {
            text-align: center;
            padding: 40px;
            background: #fff;
            border-radius: 15px;
            box-shadow: var(--shadow-medium);
            margin: 20px;
        }

        .review img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid var(--primary-color);
        }

        .review .stars {
            color: #ffc107;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .review p {
            font-style: italic;
            color: var(--light-text-color);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .review .author {
            font-weight: 600;
            color: var(--text-color);
            font-size: 1.1rem;
        }

        .footer {
            background-color: #222;
            color: #fff;
            padding: 60px 0;
            font-size: 0.9rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }

        .footer-section h4 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: var(--primary-color);
            position: relative;
        }

        .footer-section h4::after {
            content: '';
            display: block;
            width: 40px;
            height: 3px;
            background-color: #fff;
            margin-top: 10px;
            border-radius: 2px;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary-color);
        }

        .footer-section p {
            color: #ccc;
            margin-bottom: 10px;
        }

        .copyright {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid #444;
            color: #aaa;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .section-title {
                font-size: 2.8rem;
            }

            .category {
                width: 45%;
            }

            .footer-content {
                justify-content: center;
            }

            .footer-section {
                text-align: center;
            }

            .footer-section h4::after {
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width: 767px) {
            .header nav {
                display: none;
            }

            .header .btn {
                display: none;
            }

            .hamburger-menu {
                display: flex;
            }

            .mobile-nav.active {
                display: block;
            }

            .section-title {
                font-size: 2.2rem;
                margin-bottom: 40px;
            }

            .category {
                width: 100%;
            }

            section {
                padding: 50px 0;
            }

            .footer-content {
                flex-direction: column;
                align-items: center;
            }

            .footer-section {
                min-width: unset;
                width: 100%;
            }
        }

        .btn-primary {
            color: #fff;
            background-color: #c62828;
            border-color: #c62828;
        }

        .btn-primary:hover {
            background-color: #b71c1c;
            border-color: #b71c1c;
        }

        .text-primary {
            color: #c62828 !important;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }


        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #c62828;
            border-color: #c62828;
        }

        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 .2rem #c62828;
        }

        .navbar-nav .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; 
        }
    </style>
</head>

<body>

    <header class="header">
        <a href="/" class="logo">
            <img src="{{ asset(settings('logo')) }}" alt="Turning Point Logo" style="height: 65px;">
        </a>
        <nav id="main-nav" class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Courses
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($allCourses as $course)
                                <a class="dropdown-item" href="{{ route('frontend.courses.show_detail', $course->id) }}">{{ $course->title }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/books">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/branches">Branches</a></li>
                    <li class="nav-item"><a class="nav-link" href="/batch-schedule">Batch Schedule</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blogs">Blogs</a></li>
                </ul>
            </div>
        </nav>
        @if(Auth::guard('web')->check() || Auth::guard('student')->check())
            <a href="#" class="btn"
                onclick="event.preventDefault(); document.getElementById('logout-form-welcome').submit();">Logout</a>
            <form id="logout-form-welcome"
                action="{{ Auth::guard('web')->check() ? route('logout') : route('student.logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('student.login') }}" class="btn">Student Portal</a>
        @endif
        <div class="hamburger-menu" id="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <div class="mobile-nav" id="mobile-nav">
        <a href="/">Home</a>
        <a href="/courses">Courses</a>
        <a href="/books">Books</a>
        <a href="/about">About Us</a>
        <a href="/branches">Branches</a>
        <a href="/batch-schedule">Batch Schedule</a>
        <a href="/blogs">Blogs</a>
        @if(Auth::guard('web')->check() || Auth::guard('student')->check())
            <a href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form-welcome').submit();">Logout</a>
        @else
            <a href="{{ route('student.login') }}">Student Portal</a>
        @endif
    </div>

    <main>
        @yield('content')
    </main>
    <style>
        .footer-container {
            margin: 10px 1px 10px 124px;
        }

        @media (max-width: 767px) {
            .footer-container {
                margin: 10px;
            }
        }
    </style>
    <footer class="footer">

        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <style>
                        .social-icons a {
                            color: #ccc;
                            transition: color 0.3s ease, transform 0.3s ease;
                            background-color: transparent;
                            padding: 10px;
                            border-radius: 50% !important;
                        }

                        .social-icons a {
                            color: #ccc;
                            transition: color 0.3s ease, transform 0.3s ease;
                            background-color: transparent;
                            padding: 12px 10px 6px 10px;
                            border-radius: 28% !important;
                        }

                        .social-icons a:hover {
                            color: var(--primary-color);
                            transform: translateY(-5px);
                            background-color: #fff;
                        }

                        @media (max-width: 768px) {
                            .social-icons {
                                place-content: center;
                                flex-wrap: wrap;
                            }
                        }
                    </style>
                    <div class="social-icons d-flex" style="gap: 15px;">
                        <a href="https://www.facebook.com/turningandtargetpoint" target="_blank"><i
                                class="fab fa-facebook fa-2x"></i></a>
                        <a href="https://www.youtube.com/channel/UC8hBhB9Kb0q4YR7WbqWwQw" target="_blank"><i
                                class="fab fa-youtube fa-2x"></i></a>
                        <a href="https://www.instagram.com/turningandtargetpoint/" target="_blank"><i
                                class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.linkedin.com/company/turning-point-job-aid/" target="_blank"><i
                                class="fab fa-linkedin fa-2x"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Support</h4>
                    @forelse($supportEmails as $email)
                        <a href="mailto:{{ $email->email }}"><i class="fas fa-envelope"></i> {{ $email->title }}</a>
                    @empty
                        <p>No support emails available.</p>
                    @endforelse
                </div>
                <div class="footer-section" style="font-weight: bold;">
                    <h4>Head Office</h4>
                    @forelse($headOffices as $office)
                        <div>
                            <p> {{ $office->address_line1 }} <br> {{ $office->address_line2 }}<br> {{ $office->phone }}</p>
                        </div>
                    @empty
                        <p>No head office information available.</p>
                    @endforelse
                </div>
                <div class="footer-section" style="font-weight: bold;">
                    <h4>Corporate Office</h4>
                    @forelse($corporateOffices as $office)
                        <div>
                            <p>{{ $office->address_line1 }} <br> {{ $office->address_line2 }}<br> {{ $office->phone }}</p>
                        </div>
                    @empty
                        <p>No corporate office information available.</p>
                    @endforelse
                </div>
            </div>
            <div class="copyright">
                <p>Copyright © Turning Point 2025 || Developed by Ahaduzzaman</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
            }
        });

        const hamburgerMenu = document.getElementById('hamburger-menu');
        const mobileNav = document.getElementById('mobile-nav');

        hamburgerMenu.addEventListener('click', () => {
            mobileNav.classList.toggle('active');
        });

                // Close mobile nav when a link is clicked

                document.querySelectorAll('#mobile-nav a').forEach(link => {

                    link.addEventListener('click', () => {

                        mobileNav.classList.remove('active');

                    });

                });

        



            </script>

        

        </body>

</html>