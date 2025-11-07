@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="section-title text-center">{{ $category->name }} - All Courses</h2>
    <div class="row">
        @forelse($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="course-card">
                    <div class="img-container">
                        <img src="{{ asset($course->image) }}" alt="{{ $course->title }}">
                        <div class="course-fee">
                            @if($course->discount_amount)
                                <del>৳ {{ $course->real_amount }}</del> ৳ {{ $course->discount_amount }}
                            @else
                                ৳ {{ $course->real_amount }}
                            @endif
                        </div>
                        <a href="{{ route('frontend.courses.show_detail', $course->id) }}" class="view-details-hover">
                            <span class="btn btn-light">View Details</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <div class="course-info">
                            <div class="info-item">
                                <i class="fas fa-video"></i>
                                <span>{{ $course->total_lecture }} Classes</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-file-alt"></i>
                                <span>{{ $course->total_exam }} Exams</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-book"></i>
                                <span>PDFs</span>
                            </div>
                        </div>
                        <a href="{{ route('frontend.courses.show_detail', $course->id) }}" class="btn btn-primary btn-block">বিস্তারিত দেখুন</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No courses available for this category.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection