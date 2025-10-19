@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Enrolled Student List</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.students.enrolled_list') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="course_id">Filter by Course</label>
                                <select name="course_id" class="form-control">
                                    <option value="">All Courses</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="batch_id">Filter by Batch</label>
                                <select name="batch_id" class="form-control">
                                    <option value="">All Batches</option>
                                    @foreach($batches as $batch)
                                        <option value="{{ $batch->id }}" {{ request('batch_id') == $batch->id ? 'selected' : '' }}>{{ $batch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 align-self-end">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <button type="submit" name="export" value="1" class="btn btn-success">Export</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Enrolled Batches</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($students) > 0)
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->batches->pluck('name')->implode(', ') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                @if(request()->filled('course_id') || request()->filled('batch_id'))
                                <tr>
                                    <td colspan="3" class="text-center">No students found for the selected filter.</td>
                                </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
