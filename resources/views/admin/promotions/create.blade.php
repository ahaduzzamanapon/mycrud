@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Create Promotion</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('admin.promotions._form')
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
