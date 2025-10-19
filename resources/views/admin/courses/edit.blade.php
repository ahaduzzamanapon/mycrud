@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Course</h4>
                </div>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $course->duration) }}">
                    </div>
                    <div class="form-group">
                        <label for="fees">Fees</label>
                        <input type="number" step="0.01" class="form-control" id="fees" name="fees" value="{{ old('fees', $course->fees) }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $course->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Course Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @if($course->image)
                            <img src="{{ Storage::url($course->image) }}" alt="Course Image" width="100" class="mt-2">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update Course</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
