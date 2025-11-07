@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add New Head Office</h4>
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
                <form action="{{ route('admin.head_offices.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="address_line1">Address Line 1</label>
                        <input type="text" class="form-control" id="address_line1" name="address_line1" value="{{ old('address_line1') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address_line2">Address Line 2</label>
                        <input type="text" class="form-control" id="address_line2" name="address_line2" value="{{ old('address_line2') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
