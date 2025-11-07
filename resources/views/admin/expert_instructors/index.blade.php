@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Expert Instructors</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.expert_instructors.create') }}" class="btn btn-primary">Add Expert Instructor</a>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Youtube Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expertInstructors as $instructor)
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/expert_instructors/' . $instructor->image) }}" alt="Instructor Image" width="50">
                                    </td>
                                    <td>{{ $instructor->title }}</td>
                                    <td>{{ $instructor->description }}</td>
                                    <td>{{ $instructor->youtube_link }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.expert_instructors.edit', $instructor->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.expert_instructors.destroy', $instructor->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
