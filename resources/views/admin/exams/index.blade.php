@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Exams</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.exams.create') }}" class="btn btn-primary">Create Exam</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Question Paper</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Assigned Students</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->questionPaper->name ?? 'N/A' }}</td>
                                    <td>{{ $exam->start_time->format('Y-m-d H:i') }}</td>
                                    <td>{{ $exam->end_time->format('Y-m-d H:i') }}</td>
                                    <td>{{ $exam->students->pluck('name')->implode(', ') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
