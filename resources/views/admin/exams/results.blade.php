@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Results for Exam: {{ $exam->name }}</h4>
                </div>
            </div>
            <div class="card-body">
                <p>Question Paper: {{ $exam->questionPaper->name ?? 'N/A' }}</p>
                <p>Total Questions: {{ $exam->questionPaper->questions->count() }}</p>
                <p>Total Marks: {{ $exam->questionPaper->questions->sum('pivot.marks') }}</p>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Score</th>
                                <th>Total Marks</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($exam->results as $result)
                                <tr>
                                    <td>{{ $result->student->name ?? 'N/A' }}</td>
                                    <td>{{ $result->score }}</td>
                                    <td>{{ $result->total_marks }}</td>
                                    <td>{{ number_format(($result->score / $result->total_marks) * 100, 2) }}%</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No results available yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
