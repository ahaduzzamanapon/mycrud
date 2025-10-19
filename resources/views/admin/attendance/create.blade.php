@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Daily Attendance</h4>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.attendance.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="date">Attendance Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <hr>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="employees-tab" data-toggle="tab" href="#employees" role="tab" aria-controls="employees" aria-selected="true">Employees</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="false">Students</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attendance[employee][{{ $employee->id }}]" id="emp-present-{{ $employee->id }}" value="Present" checked>
                                                    <label class="form-check-label" for="emp-present-{{ $employee->id }}">Present</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attendance[employee][{{ $employee->id }}]" id="emp-absent-{{ $employee->id }}" value="Absent">
                                                    <label class="form-check-label" for="emp-absent-{{ $employee->id }}">Absent</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attendance[employee][{{ $employee->id }}]" id="emp-leave-{{ $employee->id }}" value="Leave">
                                                    <label class="form-check-label" for="emp-leave-{{ $employee->id }}">Leave</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attendance[student][{{ $student->id }}]" id="std-present-{{ $student->id }}" value="Present" checked>
                                                    <label class="form-check-label" for="std-present-{{ $student->id }}">Present</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attendance[student][{{ $student->id }}]" id="std-absent-{{ $student->id }}" value="Absent">
                                                    <label class="form-check-label" for="std-absent-{{ $student->id }}">Absent</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attendance[student][{{ $student->id }}]" id="std-leave-{{ $student->id }}" value="Leave">
                                                    <label class="form-check-label" for="std-leave-{{ $student->id }}">Leave</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save Attendance</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
