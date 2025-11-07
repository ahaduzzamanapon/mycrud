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
            <div class="row d-flex align-items-stretch justify-content-center">
                @forelse($branchesWithContent as $branch)
                    <div class="col-md-5 mb-4">
                        <div class="branch-card h-100" style="border: 4px solid #e53935;text-align: center;border-radius: 10px;">
                            <a href="{{ route('frontend.branches.show_courses', $branch->slug) }}">
                                <img src="{{ asset($branch->logo) }}" alt="{{ $branch->name }}" class="img-fluid" style="width: 70%;height: auto;">
                            </a>
                            <div style="padding: 10px 35px;"> 
                                @forelse($branch->categories as $category)
                                    <a href="{{ route('frontend.categories.show_courses', $category->slug) }}" class="btn btn-primary btn-block category-button">{{ $category->name }}</a>
                                @empty
                                    <div class="col-12 text-center">
                                        <p>No categories available for {{ $branch->name }}.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No branches available.</p>
                    </div>
                @endforelse
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

     <section class="why-choose-us bg-gray p-0 ">
           <img src="{{ asset('images/directors.webp') }}" alt="" style="width: 100%;">
    </section>
@endsection