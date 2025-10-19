@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Exam: {{ $exam->name }}</h4>
                </div>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Exam Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $exam->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="question_paper_id">Question Paper</label>
                        <select class="form-control" id="question_paper_id" name="question_paper_id" required>
                            <option value="">-- Select Question Paper --</option>
                            @foreach($questionPapers as $qp)
                                <option value="{{ $qp->id }}" {{ $exam->question_paper_id == $qp->id ? 'selected' : '' }}>{{ $qp->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $exam->start_time->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $exam->end_time->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="students">Assign Students</label>
                        <select multiple class="form-control" id="students" name="students[]" required>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ in_array($student->id, $assignedStudents) ? 'selected' : '' }}>{{ $student->name }} ({{ $student->email }})</option>
                            @endforeach
                        </select>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="select-all-students">
                            <label class="form-check-label" for="select-all-students">Select All Students</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Exam</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAllStudentsCheckbox = document.getElementById('select-all-students');
    const studentsSelect = document.getElementById('students');

    // Set initial state for select all checkbox
    let allSelected = true;
    for (let i = 0; i < studentsSelect.options.length; i++) {
        if (!studentsSelect.options[i].selected) {
            allSelected = false;
            break;
        }
    }
    selectAllStudentsCheckbox.checked = allSelected;

    selectAllStudentsCheckbox.addEventListener('change', function() {
        for (let i = 0; i < studentsSelect.options.length; i++) {
            studentsSelect.options[i].selected = this.checked;
        }
    });
});
</script>
@endpush
