
    <!-- Bootstrap CSS -->
    
    
    
    
    
    


    
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turning Point - Job Preparation Platform</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        :root {
            --primary-color: #e53935;
            --secondary-color: #fce4ec;
            --text-color: #333;
            --light-text-color: #555;
            --bg-light: #fdfdfd;
            --bg-gray: #f9f9f9;
            --shadow-light: 0 4px 15px rgba(0,0,0,0.05);
            --shadow-medium: 0 10px 30px rgba(0,0,0,0.07);
            --shadow-hover: 0 20px 40px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
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
        .header nav a {
            text-decoration: none;
            color: var(--light-text-color);
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s ease;
            cursor: pointer;
            color: inherit !important;
        }
        .header nav a:hover {
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

        .hero {
            background-image: linear-gradient(45deg, rgba(105, 101, 101, 0.8), rgba(208, 208, 208, 0.7)), url('{{ asset('images/2.jpg') }}');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 150px 20px;
            color: #fff;
            position: relative;
            animation: heroFadeIn 1s ease-out, zoomIn 20s infinite alternate;
        }
        @keyframes zoomIn {
            from { background-size: 100% 100%; }
            to { background-size: 110% 110%; }
        }
        @keyframes heroFadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .hero h1 {
            font-size: 4.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .hero .btn {
            background-color: var(--primary-color);
            padding: 18px 40px;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }

        .hero .btn:hover {
            background-color: #7a0c0cff;
            color: #fff;
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
            background-color: #fff;
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
            padding: 30px;
        }
        .why-choose-us .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-color);
        }
        .why-choose-us .card-text {
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

        .featured-on .logos {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 30px;
        }

        .featured-on .logos img {
            height: 40px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .featured-on .logos img:hover {
            opacity: 1;
        }

        .counter-section {
            background-color: var(--primary-color);
            color: #fff;
            padding: 60px 0;
        }

        .counter {
            padding: 20px;
        }

        .counter .fa-3x {
            font-size: 3.5rem;
            margin-bottom: 15px;
        }

        .count-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .count-text {
            font-size: 1.2rem;
            font-weight: 500;
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
            .hero h1 {
                font-size: 3.5rem;
            }
            .hero p {
                font-size: 1.3rem;
            }
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
            .hero {
                padding: 100px 15px;
            }
            .hero h1 {
                font-size: 2.5rem;
            }
            .hero p {
                font-size: 1.1rem;
            }
            .hero .btn {
                padding: 12px 25px;
                font-size: 1rem;
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
    </style>
</head>
<body>

    <header class="header">
        <a href="/" class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Turning Point Logo" style="height: 40px;">
        </a>
        <nav id="main-nav">
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
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-welcome').submit();">Logout</a>
        @else
            <a href="{{ route('student.login') }}">Student Portal</a>
        @endif
    </div>

    <section class="hero">
        <div class="container">
            <h1>Unlock Your Potential with Turning Point</h1>
            <p>বিসিএস, ব্যাংক ও সরকারি চাকরির প্রস্তুতির জন্য বাংলাদেশের প্রথম অনলাইন ও অফলাইন প্ল্যাটফর্ম।</p>
            <a href="{{ route('student.register') }}" class="btn">Start Your Journey</a>
        </div>
    </section>

    <section class="why-choose-us bg-gray">
        <div class="container">
            <h2 class="section-title">Why Choose Us?</h2>
            <div class="col-md-12">
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 p-4 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-chalkboard-teacher fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Expert Instructors</h5>
                                <p class="card-text">Learn from industry veterans and experienced educators.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 p-4 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-book-reader fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Comprehensive Curriculum</h5>
                                <p class="card-text">Up-to-date materials covering all exam topics.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 p-4 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Dedicated Support</h5>
                                <p class="card-text">24/7 support to guide you through your journey.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="counter">
                        <i class="fas fa-users fa-3x"></i>
                        <h2 class="timer count-title count-number" data-to="10000" data-speed="2000"></h2>
                        <p class="count-text ">Happy Students</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="counter">
                        <i class="fas fa-book fa-3x"></i>
                        <h2 class="timer count-title count-number" data-to="50" data-speed="2000"></h2>
                        <p class="count-text ">Courses</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="counter">
                        <i class="fas fa-award fa-3x"></i>
                        <h2 class="timer count-title count-number" data-to="5000" data-speed="2000"></h2>
                        <p class="count-text ">Successful Placements</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="courses">
        <div class="container">
            <h2 class="section-title">Our Popular Courses</h2>
            @php
                use App\Models\Course;
                $courses = Course::latest()->take(5)->get();
                $icons = ['fa-university', 'fa-graduation-cap', 'fa-school', 'fa-globe', 'fa-landmark'];
            @endphp
            <div class="course-categories">
                @foreach($courses as $key => $course)
                    <div class="category">
                        <div class="icon"><i class="fas {{ $icons[$key % count($icons)] }}"></i></div>
                        <h3>{{ $course->name }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="upcoming-batches">
        <div class="container">
            <h2 class="section-title">Upcoming Batches</h2>
            <div class="row">
                @php
                    use App\Models\Batch;
                    $upcomingBatches = Batch::with('course')->where('start_date', '>=', now())->orderBy('start_date')->limit(3)->get();
                @endphp

                @forelse($upcomingBatches as $batch)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $batch->name }}</h5>
                                <p class="card-text"><strong>Course:</strong> {{ $batch->course->name ?? 'N/A' }}</p>
                                <p class="card-text"><strong>Starts:</strong> {{ \Carbon\Carbon::parse($batch->start_date)->format('M d, Y') }}</p>
                                <p class="card-text"><strong>Ends:</strong> {{ \Carbon\Carbon::parse($batch->end_date)->format('M d, Y') }}</p>
                                <a href="{{ route('student.enroll.create') }}" class="btn btn-sm btn-primary mt-2">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No upcoming batches at the moment. Please check back later!</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="/batch-schedule" class="btn btn-primary">View All Batches</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <div class="container">
            <h2 class="section-title">What Our Students Say</h2>
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
        </div>
    </section>

    <footer class="footer">
        <div class="container">
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
                    <p>info@turningpoint.com</p>
                    <p>01713 28 91 49</p>
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

        (function ($) {
            $.fn.countTo = function (options) {
                options = options || {};

                return $(this).each(function () {
                    // set options for current element
                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from: $(this).data('from'),
                        to: $(this).data('to'),
                        speed: $(this).data('speed'),
                        refreshInterval: $(this).data('refresh-interval'),
                        decimals: $(this).data('decimals')
                    }, options);

                    // how many times to update the value, and the value step for each update
                    var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;

                    // references & variables that will change with each update
                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};

                    $self.data('countTo', data);

                    // if an existing interval can be found, clear it first
                    if (data.interval) {
                        clearInterval(data.interval);
                    }
                    data.interval = setInterval(updateTimer, settings.refreshInterval);

                    // initialize the element with the starting value
                    render(value);

                    function updateTimer() {
                        value += increment;
                        loopCount++;

                        render(value);

                        if (typeof (settings.onUpdate) == 'function') {
                            settings.onUpdate.call(self, value);
                        }

                        if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData('countTo');
                            clearInterval(data.interval);
                            value = settings.to;

                            if (typeof (settings.onComplete) == 'function') {
                                settings.onComplete.call(self, value);
                            }
                        }
                    }

                    function render(value) {
                        var formattedValue = settings.formatter.call(self, value, settings);
                        $self.html(formattedValue);
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: 0,               // the number the element should start at
                to: 0,                 // the number the element should end at
                speed: 1000,           // how long it should take to count between the target numbers
                refreshInterval: 100,  // how often the element should be updated
                decimals: 0,           // the number of decimal places to show
                formatter: formatter,  // handler for formatting the value before rendering
                onUpdate: null,        // callback function for every update
                onComplete: null       // callback function for when the animation is complete
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));

        jQuery(function ($) {
            // custom formatting example
            $('.count-number').data('countToOptions', {
                formatter: function (value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });

            // start all the timers
            $('.timer').each(count);

            function count(options) {
                var $this = $(this);
                options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                $this.countTo(options);
            }

            // Smooth scrolling
            $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (event) {
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) {
                                return false;
                            }
                            $target.attr('tabindex', '-1');
                            $target.focus();
                        });
                    }
                }
            });
        });
    </script>

</body>
</html>
