@extends('layouts.student')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">My Courses</h2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Enrollment History</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Batch</th>
                                    <th>Payment Status</th>
                                    <th>Completion Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($enrollments as $enrollment)
                                    <tr>
                                        <td>{{ $enrollment->course->name ?? 'N/A' }}</td>
                                        <td>{{ $enrollment->batch->name ?? 'N/A' }}</td>
                                        <td>
                                            @if($enrollment->status == 'approved')
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($enrollment->status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @else
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($enrollment->status != 'approved')
                                                <span class="badge badge-secondary">N/A</span>
                                            @elseif($enrollment->batch && $enrollment->batch->end_date < now())
                                                <span class="badge badge-info">Completed</span>
                                            @else
                                                <span class="badge badge-primary">Ongoing</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">You have not enrolled in any courses yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection