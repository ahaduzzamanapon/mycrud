@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Attendance Report</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.attendance.report') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_from">Date From</label>
                                <input type="date" class="form-control" name="date_from" value="{{ request('date_from') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_to">Date To</label>
                                <input type="date" class="form-control" name="date_to" value="{{ request('date_to') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user_type">User Type</label>
                                <select name="user_type" class="form-control">
                                    <option value="">All</option>
                                    <option value="employee" {{ request('user_type') == 'employee' ? 'selected' : '' }}>Employee</option>
                                    <option value="student" {{ request('user_type') == 'student' ? 'selected' : '' }}>Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">All</option>
                                    <option value="Present" {{ request('status') == 'Present' ? 'selected' : '' }}>Present</option>
                                    <option value="Absent" {{ request('status') == 'Absent' ? 'selected' : '' }}>Absent</option>
                                    <option value="Leave" {{ request('status') == 'Leave' ? 'selected' : '' }}>Leave</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <button type="submit" name="export" value="1" class="btn btn-success">Export</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($attendances) > 0)
                                @foreach($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->date }}</td>
                                        <td>{{ $attendance->attendable->name ?? 'N/A' }}</td>
                                        <td>{{ str_replace('App\\Models\\', '', $attendance->attendable_type) }}</td>
                                        <td>{{ $attendance->status }}</td>
                                    </tr>
                                @endforeach
                            @else
                                @if(request()->isMethod('post'))
                                <tr>
                                    <td colspan="4" class="text-center">No records found.</td>
                                </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
