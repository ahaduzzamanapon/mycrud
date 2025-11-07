@extends('layouts.app')

@section('content')
    @php
        use App\Models\Promotion;
        use App\Models\SiteSetting;
        use App\Models\ExpertInstructor;
        use App\Models\CourseOutline;
        use App\Models\DedicatedSupport;
        $promotions = Promotion::where('status', 1)->limit(2)->get();
        $siteSetting = SiteSetting::first();
        $expertInstructors = ExpertInstructor::all();
        $courseOutlines = CourseOutline::all();
        $dedicatedSupports = DedicatedSupport::all();
    @endphp

    <section class="hero-section">
        <div class="container">
            <div class="row">
                @if($promotions->count() > 0)
                    @foreach($promotions as $promotion)
                        <div class="col-md-6 mb-4">
                            <style>
                                .promotion-card h1:hover {
                                    transition: background-color 0.3s, color 0.3s;
                                    background-color: white;
                                    color: #e53935;
                                    cursor: pointer;
                                }
                            </style>
                            <div class="promotion-card" style="border: 4px solid #e53935;text-align: center;">
                                <a href="{{ route('promotion.show', $promotion) }}">
                                    <img src="{{ asset($promotion->image) }}" alt="{{ $promotion->title }}" class="img-fluid">
                                </a>
                                <a href="{{ route('promotion.show', $promotion) }}">
                                <h1 style="font-weight: 700;place-self: center;cursor: pointer;background: #e53935;border-radius: 13px;color: white;padding: 14px;font-size: 22px;">{{ $promotion->title }}</h1>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    @if($siteSetting && $siteSetting->marquee_text)
        <div class="marquee-container">
            <div class="marquee-text">{{ $siteSetting->marquee_text }}</div>
        </div>
    @endif

    <section class="why-choose-us bg-gray">
        <div class="container">
            <h2 class="section-title">Why Choose Us?</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="border: 3px solid #e53935;">
                        <div class="card-body">
                            <h5 class="card-title">Expert Instructors</h5>
                            <hr style="border-color: #e53935;">
                            @forelse($expertInstructors as $instructor)
                            <div class="d-flex align-items-center mb-3" style="box-shadow: 0px 0px 4px 3px #efefef;padding: 6px 16px;border-radius: 7px;">
                                <img src="{{ asset('images/expert_instructors/' . $instructor->image) }}" alt="{{ $instructor->title }}" class="img-fluid rounded-circle mr-3" width="50">
                                <div class="text-left">
                                    <h6 style="width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $instructor->title }}</h6>
                                    <a href="{{ $instructor->youtube_link }}" target="_blank" class="btn btn-sm btn-primary mt-1">YouTube Link</a>
                                </div>
                            </div>
                            @empty
                            <p class="card-text">No expert instructors available yet. Please add some from the admin panel.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="border: 3px solid #e53935;">
                        <div class="card-body">
                            <h5 class="card-title">Course Outlines</h5>
                            <hr style="border-color: #e53935;">
                            @forelse($courseOutlines as $outline)
                            <div class="d-flex align-items-center mb-3" style="box-shadow: 0px 0px 4px 3px #efefef;padding: 6px 16px;border-radius: 7px;">
                                <i class="fas fa-file-pdf fa-2x text-primary mr-3"></i>
                                <div class="text-left">
                                    <h6 style="width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $outline->title }}</h6>
                                    <a href="{{ asset($outline->pdf_path) }}" class="btn btn-sm btn-primary mt-1" target="_blank">Download PDF</a>
                                </div>
                            </div>
                            @empty
                            <p class="card-text">No course outlines available yet. Please add some from the admin panel.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="border: 3px solid #e53935;">
                        <div class="card-body">
                            <h5 class="card-title">Dedicated Support</h5>
                            <hr style="border-color: #e53935;">
                            @forelse($dedicatedSupports as $support)
                            <div class="d-flex align-items-center mb-3" style="box-shadow: 0px 0px 4px 3px #efefef;padding: 6px 16px;border-radius: 7px;">
                                <i class="fas fa-phone fa-2x text-primary mr-3"></i>
                                <div class="text-left">
                                    <h6 style="width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $support->title }}</h6>
                                    <p class="card-text mb-0">{{ $support->number }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="card-text">No dedicated support contacts available yet. Please add some from the admin panel.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- 
    <section class="courses">
        <div class="container">
            <h2 class="section-title">Our Popular Courses</h2>
            <div class="course-categories">
                <div class="category">
                    <div class="icon"><i class="fas fa-university"></i></div>
                    <h3>Bank Job Preparation</h3>
                </div>
                <div class="category">
                    <div class="icon"><i class="fas fa-graduation-cap"></i></div>
                    <h3>MBA Admission</h3>
                </div>
                <div class="category">
                    <div class="icon"><i class="fas fa-school"></i></div>
                    <h3>PRIMARY & NTRCA</h3>
                </div>
                <div class="category">
                    <div class="icon"><i class="fas fa-globe"></i></div>
                    <h3>E-Language</h3>
                </div>
                <div class="category">
                    <div class="icon"><i class="fas fa-landmark"></i></div>
                    <h3>BCS Preparation</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="upcoming-batches">
        <div class="container">
            <h2 class="section-title">Upcoming Batches</h2>
            <div class="row">
                @php
                    use App\Models\Batch;
                    $upcomingBatches = Batch::with('course')->where('start_date', '>=', now())->orderBy('start_date')->limit(4)->get();
                @endphp

                @forelse($upcomingBatches as $batch)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $batch->name }}</h5>
                                <p class="card-text"><strong>Course:</strong> {{ $batch->course->name ?? 'N/A' }}</p>
                                <p class="card-text"><strong>Starts:</strong>
                                    {{ \Carbon\Carbon::parse($batch->start_date)->format('M d, Y') }}</p>
                                <p class="card-text"><strong>Ends:</strong>
                                    {{ \Carbon\Carbon::parse($batch->end_date)->format('M d, Y') }}</p>
                                <a href="{{ route('student.enroll.create') }}" class="btn btn-sm btn-primary mt-2">Enroll
                                    Now</a>
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
                            <p>"Turning Point is the Pioneer and the most effective coaching centre for upgrading any
                                job seekers career..."</p>
                            <div class="author">- Mahmood Ibn Bhuiyan</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review">
                            <img src="https://picsum.photos/100/100?random=2" alt="Reviewer">
                            <div class="stars">★★★★★</div>
                            <p>"লক্ষ্য পূরণ করার জার্নিটা শুরু হয় ২০১৩ সালে, ঢাকায় যাই BCS Coaching করার জন্য, Exam দেই
                                But Output Zero..."</p>
                            <div class="author">- Popy Talpatra</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}

     <section class="why-choose-us bg-gray p-0 ">
           <img src="{{ asset('images/directors.webp') }}" alt="" style="width: 100%;">
    </section>
@endsection
