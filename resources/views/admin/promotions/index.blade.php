@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Promotions</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">Create Promotion</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($promotions as $promotion)
                                <tr>
                                    <td><img src="{{ asset( $promotion->image) }}" alt="{{ $promotion->title }}" width="100"></td>
                                    <td>{{ $promotion->title }}</td>
                                    <td>{{ $promotion->status ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $promotion->order }}</td>
                                    <td>
                                        <a href="{{ route('admin.promotions.edit', $promotion->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No promotions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
