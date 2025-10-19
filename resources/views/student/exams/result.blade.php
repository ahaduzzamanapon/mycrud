@extends('layouts.student')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Exam Results: {{ $exam->name }}</h2>

    <div class="card">
        <div class="card-header">
            <h4>Your Score</h4>
        </div>
        <div class="card-body">
            <p>You scored: <strong>{{ $result->score }}</strong> out of <strong>{{ $result->total_marks }}</strong></p>
            <p>Percentage: <strong>{{ number_format(($result->score / $result->total_marks) * 100, 2) }}%</strong></p>
            <a href="{{ route('student.exams.index') }}" class="btn btn-primary">Back to Exams</a>
        </div>
    </div>
</div>
@endsection
