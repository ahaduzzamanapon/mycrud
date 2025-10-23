@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if($promotion->image)
                        <img src="{{ asset( $promotion->image) }}" alt="{{ $promotion->title }}" class="img-fluid mb-3">
                    @endif
                    <h3>{{ $promotion->title }}</h3>

                    <p>{{ $promotion->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
