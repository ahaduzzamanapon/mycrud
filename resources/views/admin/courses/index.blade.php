@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Courses</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add Course</a>
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Duration</th>
                                <th>Fees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>
                                        @if($course->image)
                                            <img src="{{ Storage::url($course->image) }}" alt="Course Image" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->duration }}</td>
                                    <td>{{ number_format($course->fees, 2) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
