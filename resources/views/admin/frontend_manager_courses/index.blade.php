@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Frontend Manager Courses</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.frontend_manager_courses.create') }}" class="btn btn-primary">Add Course</a>
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
                                <th>Category</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Real Amount</th>
                                <th>Discount Amount</th>
                                <th>Offer Expire Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course->category->name ?? 'N/A' }}</td>
                                    <td>
                                        @if($course->image)
                                            <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" width="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->real_amount }}</td>
                                    <td>{{ $course->discount_amount ?? 'N/A' }}</td>
                                    <td>{{ $course->offer_expire_date ? \Carbon\Carbon::parse($course->offer_expire_date)->format('M d, Y') : 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.frontend_manager_courses.edit', $course->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.frontend_manager_courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
