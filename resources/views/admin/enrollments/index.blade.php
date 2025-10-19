@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pending Enrollment Requests</h4>
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
                                <th>Student</th>
                                <th>Course</th>
                                <th>Batch</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Transaction #</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pendingEnrollments) > 0)
                                @foreach($pendingEnrollments as $enrollment)
                                    <tr>
                                        <td>{{ $enrollment->student->name }}</td>
                                        <td>{{ $enrollment->course->name }}</td>
                                        <td>{{ $enrollment->batch->name }}</td>
                                        <td>{{ number_format($enrollment->amount, 2) }}</td>
                                        <td>{{ $enrollment->paymentMethod->name }}</td>
                                        <td>{{ $enrollment->transaction_number }}</td>
                                        <td>{{ $enrollment->phone_number }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('admin.enrollments.approve', $enrollment->id) }}" method="POST" class="mr-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.enrollments.reject', $enrollment->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
