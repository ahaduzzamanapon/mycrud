@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add New Payment Method</h4>
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
                <form action="{{ route('admin.payment_methods.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Method Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Number (optional)</label>
                        <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Method</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
