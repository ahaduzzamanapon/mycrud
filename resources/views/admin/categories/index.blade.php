@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Categories</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
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
                                <th>Branch</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->branch->name ?? 'N/A' }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
