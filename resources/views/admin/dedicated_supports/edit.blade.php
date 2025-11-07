@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Dedicated Support</h4>
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
                <form action="{{ route('admin.dedicated_supports.update', $dedicatedSupport->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $dedicatedSupport->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text" class="form-control" id="number" name="number" value="{{ old('number', $dedicatedSupport->number) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
