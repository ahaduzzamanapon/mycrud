@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Head Offices</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.head_offices.create') }}" class="btn btn-primary">Add Head Office</a>
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
                                <th>Address Line 1</th>
                                <th>Address Line 2</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($headOffices as $office)
                                <tr>
                                    <td>{{ $office->address_line1 }}</td>
                                    <td>{{ $office->address_line2 }}</td>
                                    <td>{{ $office->phone }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.head_offices.edit', $office->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.head_offices.destroy', $office->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
