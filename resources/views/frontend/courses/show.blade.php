@extends('layouts.app')

@section('content')
<div class="container mt-5 course-details-page">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="course-title">{{ $course->title }}</h1>
            <p class="admission-status"><i class="fas fa-fire"></i> ভর্তি চলছে...</p>
            <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="course-image">

            <ul class="nav nav-tabs" id="courseTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Overview</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="instructors-tab" data-toggle="tab" href="#instructors" role="tab" aria-controls="instructors" aria-selected="false">Instructor</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="routine-tab" data-toggle="tab" href="#routine" role="tab" aria-controls="routine" aria-selected="false">Routine</a>
                </li>
            </ul>
            <div class="tab-content" id="courseTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    {!! $course->description !!}
                </div>
                <div class="tab-pane fade" id="instructors" role="tabpanel" aria-labelledby="instructors-tab">
                    <ul>
                        @foreach(json_decode($course->instructors, true) as $instructor)
                            <li>{{ $instructor }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="routine" role="tabpanel" aria-labelledby="routine-tab">
                    {!! $course->routine !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="course-features-box">
                <div class="price-section">
                    @if($course->discount_amount)
                        <span class="current-price">৳ {{ $course->discount_amount }}</span>
                        <span class="original-price">৳ {{ $course->real_amount }}</span>
                    @else
                        <span class="current-price">৳ {{ $course->real_amount }}</span>
                    @endif
                </div>
                @if($course->offer_expire_date)
                    <div class="offer-countdown">
                        <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($course->offer_expire_date)->diffForHumans() }} left at this price!
                    </div>
                @endif
                <ul class="feature-list">
                    <li>
                        <span><i class="fas fa-clock"></i> Course Duration</span>
                        <strong>{{ $course->course_duration }}</strong>
                    </li>
                    <li>
                        <span><i class="fas fa-video"></i> Total Lecture</span>
                        <strong>{{ $course->total_lecture }}</strong>
                    </li>
                    <li>
                        <span><i class="fas fa-file-alt"></i> Total Exam</span>
                        <strong>{{ $course->total_exam }}</strong>
                    </li>
                    <li>
                        <span><i class="fas fa-chalkboard-teacher"></i> Live class</span>
                        <strong>{{ $course->live_class }}</strong>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-lg btn-block">কোর্সটি কিনুন</a>
                <div class="includes-section">
                    <h5>This Course includes:</h5>
                    <ul class="includes-list">
                        @foreach(json_decode($course->course_includes, true) as $item)
                            <li><i class="fas fa-check-circle"></i> {{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="contact-section">
                    <h5>কোর্সটি সম্পর্কে বিস্তারিত জানতে কল করুন</h5>
                    <a href="tel:09644433300" class="h4 text-danger">📞 09644433300</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
