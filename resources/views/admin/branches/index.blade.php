@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Branches</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.branches.create') }}" class="btn btn-primary">Add Branch</a>
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
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <td>{{ $branch->name }}</td>
                                    <td>
                                        @if($branch->logo)
                                            <img src="{{ asset($branch->logo) }}" alt="{{ $branch->name }}" width="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $branch->slug }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.branches.destroy', $branch->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
