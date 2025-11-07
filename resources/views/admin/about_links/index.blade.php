@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All About Links</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.about_links.create') }}" class="btn btn-primary">Add About Link</a>
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
                                <th>Title</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aboutLinks as $link)
                                <tr>
                                    <td>{{ $link->title }}</td>
                                    <td>{{ $link->url }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.about_links.edit', $link->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.about_links.destroy', $link->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
