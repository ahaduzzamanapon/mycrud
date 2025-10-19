@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Exam Results</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.exam_results.index') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exam_id">Filter by Exam</label>
                                <select name="exam_id" class="form-control">
                                    <option value="">All Exams</option>
                                    @foreach($exams as $exam)
                                        <option value="{{ $exam->id }}" {{ request('exam_id') == $exam->id ? 'selected' : '' }}>{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="student_id">Filter by Student</label>
                                <select name="student_id" class="form-control">
                                    <option value="">All Students</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->email }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Exam Name</th>
                                <th>Student Name</th>
                                <th>Score</th>
                                <th>Total Marks</th>
                                <th>Percentage</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($results) > 0)
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result->exam->name ?? 'N/A' }}</td>
                                        <td>{{ $result->student->name ?? 'N/A' }}</td>
                                        <td>{{ $result->score }}</td>
                                        <td>{{ $result->total_marks }}</td>
                                        <td>{{ number_format(($result->score / $result->total_marks) * 100, 2) }}%</td>
                                        <td>
                                            <a href="{{ route('admin.exam_results.answer_paper', $result->id) }}" class="btn btn-sm btn-info">View Answer Paper</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No results found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
