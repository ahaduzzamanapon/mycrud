@extends('layouts.student')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Welcome back, {{ Auth::guard('student')->user()->name }}!</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card-dashboard">
                <h4>Courses Enrolled</h4>
                <p class="display-4">5</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card-dashboard">
                <h4>Assignments Due</h4>
                <p class="display-4">2</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card-dashboard">
                <h4>Profile Completion</h4>
                <p class="display-4">80%</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="chart-container">
                <canvas id="courseProgressChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('courseProgressChart').getContext('2d');
    const courseProgressChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Course A', 'Course B', 'Course C', 'Course D', 'Course E'],
            datasets: [{
                label: 'Course Progress (%)',
                data: [80, 50, 95, 70, 85],
                backgroundColor: 'rgba(229, 57, 53, 0.7)',
                borderColor: 'rgba(229, 57, 53, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>
@endpush