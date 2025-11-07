@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Support Emails</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.support_emails.create') }}" class="btn btn-primary">Add Support Email</a>
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
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supportEmails as $email)
                                <tr>
                                    <td>{{ $email->title }}</td>
                                    <td>{{ $email->email }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.support_emails.edit', $email->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.support_emails.destroy', $email->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
