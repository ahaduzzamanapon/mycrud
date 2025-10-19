@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">All Question Papers</h4>
                </div>
                <div class="header-action">
                    <a href="{{ route('admin.question_papers.create') }}" class="btn btn-primary">Create Question Paper</a>
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
                                <th>Total Questions</th>
                                <th>Total Marks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questionPapers as $qp)
                                <tr>
                                    <td>{{ $qp->name }}</td>
                                    <td>{{ $qp->questions->count() }}</td>
                                    <td>{{ $qp->questions->sum('pivot.marks') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.question_papers.edit', $qp->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('admin.question_papers.destroy', $qp->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
