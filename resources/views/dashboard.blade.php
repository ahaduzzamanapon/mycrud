@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-primary text-primary me-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Students</h5>
                        <h3 class="mb-0">{{ $totalStudents }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-info text-info me-3">
                        <i class="fas fa-book"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Courses</h5>
                        <h3 class="mb-0">{{ $totalCourses }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-success text-success me-3">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Enrolled</h5>
                        <h3 class="mb-0">{{ $totalEnrollments }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-warning text-warning me-3">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Exams</h5>
                        <h3 class="mb-0">{{ $totalExams }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-danger text-danger me-3">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Subjects</h5>
                        <h3 class="mb-0">{{ $totalSubjects }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-purple text-purple me-3">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Questions</h5>
                        <h3 class="mb-0">{{ $totalQuestions }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-dark text-dark me-3">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Admins</h5>
                        <h3 class="mb-0">{{ $totalUsers }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg-secondary text-secondary me-3">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Total Transactions</h5>
                        <h3 class="mb-0">{{ $totalTransactions }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Enrollments per Month</h5>
            </div>
            <div class="card-body">
                <canvas id="enrollmentsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Course Popularity</h5>
            </div>
            <div class="card-body">
                <canvas id="coursePopularityChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Enrollments per Month Chart
    const enrollmentsCtx = document.getElementById('enrollmentsChart').getContext('2d');
    const enrollmentsChart = new Chart(enrollmentsCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($enrollmentLabels) !!},
            datasets: [{
                label: 'Enrollments',
                data: {!! json_encode($enrollmentData) !!},
                backgroundColor: 'rgba(229, 57, 53, 0.7)',
                borderColor: 'rgba(229, 57, 53, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Course Popularity Chart
    const coursePopularityCtx = document.getElementById('coursePopularityChart').getContext('2d');
    const coursePopularityChart = new Chart(coursePopularityCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($coursePopularityLabels) !!},
            datasets: [{
                label: 'Course Popularity',
                data: {!! json_encode($coursePopularityData) !!},
                backgroundColor: [
                    'rgba(229, 57, 53, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(255, 205, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                ],
                borderColor: [
                    'rgba(229, 57, 53, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>
@endpush
