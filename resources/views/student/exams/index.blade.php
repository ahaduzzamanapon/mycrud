@extends('layouts.student')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">My Exams</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Assigned Exams</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Exam Name</th>
                            <th>Question Paper</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($exams as $exam)
                            <tr>
                                <td>{{ $exam->name }}</td>
                                <td>{{ $exam->questionPaper->name ?? 'N/A' }}</td>
                                <td>{{ $exam->start_time->format('Y-m-d H:i') }}</td>
                                <td>{{ $exam->end_time->format('Y-m-d H:i') }}</td>
                                <td>
                                    <span id="exam-status-{{ $exam->id }}">
                                        @if($exam->status == 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @elseif($exam->status == 'active')
                                            <span class="badge badge-primary">Active</span>
                                        @elseif($exam->status == 'ended')
                                            <span class="badge badge-secondary">Ended</span>
                                        @else
                                            <span class="badge badge-info">Upcoming</span>
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <span id="exam-actions-{{ $exam->id }}">
                                        @if($exam->can_start)
                                            <a href="{{ route('student.exams.take', $exam->id) }}" class="btn btn-sm btn-success">Start Exam</a>
                                        @elseif($exam->has_taken)
                                            <a href="{{ route('student.exams.result', $exam->id) }}" class="btn btn-sm btn-info">View Result</a>
                                        @else
                                            <button class="btn btn-sm btn-secondary" disabled>Not Available</button>
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No exams assigned to you yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const exams = @json($exams);

    exams.forEach(exam => {
        const examId = exam.id;
        const startTime = new Date(exam.start_time_iso);
        const endTime = new Date(exam.end_time_iso);
        const examStatusSpan = document.getElementById(`exam-status-${examId}`);
        const examActionsSpan = document.getElementById(`exam-actions-${examId}`);

        function updateExamStatus() {
            const now = new Date();
            let statusHtml = '';
            let actionsHtml = '';

            if (exam.has_taken) {
                statusHtml = '<span class="badge badge-success">Completed</span>';
                actionsHtml = `<a href="/student/exams/${examId}/result" class="btn btn-sm btn-info">View Result</a>`;
            } else if (now >= startTime && now <= endTime) {
                statusHtml = '<span class="badge badge-primary">Active</span>';
                actionsHtml = `<a href="/student/exams/${examId}/take" class="btn btn-sm btn-success">Start Exam</a>`;
            } else if (now > endTime) {
                statusHtml = '<span class="badge badge-secondary">Ended</span>';
                actionsHtml = '<button class="btn btn-sm btn-secondary" disabled>Ended</button>';
            } else {
                statusHtml = '<span class="badge badge-info">Upcoming</span>';
                actionsHtml = '<button class="btn btn-sm btn-secondary" disabled>Not Available</button>';
            }

            if (examStatusSpan) {
                examStatusSpan.innerHTML = statusHtml;
            }
            if (examActionsSpan) {
                examActionsSpan.innerHTML = actionsHtml;
            }
        }

        // Update status immediately and then every second
        updateExamStatus();
        setInterval(updateExamStatus, 1000);
    });
});
</script>
@endpush
