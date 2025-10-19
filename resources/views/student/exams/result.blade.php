@extends('layouts.student')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Exam Results: {{ $exam->name }}</h2>

    <div class="card">
        <div class="card-header">
            <h4>Your Score</h4>
        </div>
        <div class="card-body">
            <p>You scored: <strong>{{ $result->score }}</strong> out of <strong>{{ $result->total_marks }}</strong></p>
            <p>Percentage: <strong>{{ number_format(($result->score / $result->total_marks) * 100, 2) }}%</strong></p>
            <hr>

            <h5>Your Answer Paper</h5>
            @foreach($exam->questionPaper->questions as $key => $question)
                @php
                    $studentAnswer = $studentAnswers[$question->id] ?? null;
                    $isCorrectOverall = $studentAnswer ? $studentAnswer->is_correct : false;
                @endphp
                <div class="card mb-3 {{ $isCorrectOverall ? 'border-success' : 'border-danger' }}">
                    <div class="card-header">
                        Question {{ $key + 1 }}: {{ $question->question_text }} ({{ $question->pivot->marks }} Marks)
                        <span class="float-right">
                            @if($studentAnswer)
                                @if($isCorrectOverall)
                                    <span class="badge badge-success">Correct ({{ $studentAnswer->marks_obtained }} Marks)</span>
                                @else
                                    <span class="badge badge-danger">Incorrect ({{ $studentAnswer->marks_obtained }} Marks)</span>
                                @endif
                            @else
                                <span class="badge badge-secondary">Not Answered</span>
                            @endif
                        </span>
                    </div>
                    <div class="card-body">
                        <h6>Options:</h6>
                        <ul class="list-group mb-3">
                            @foreach($question->options as $option)
                                @php
                                                                            $isSubmitted = false;
                                                                            if ($studentAnswer) {
                                                                                if ($question->type == 'single') {
                                                                                    $isSubmitted = ($studentAnswer->option_id == $option->id);
                                                                                } else {
                                                                                    $submittedOptionIds = (array) $studentAnswer->option_ids;
                                                                                    $isSubmitted = in_array($option->id, $submittedOptionIds);
                                                                                }
                                                                            }
                                                                        $isCorrectOption = $option->is_correct;
                                    $optionClass = '';
                                    if ($isSubmitted && $isCorrectOption) {
                                        $optionClass = 'list-group-item-success'; // Submitted and Correct
                                    } elseif ($isSubmitted && !$isCorrectOption) {
                                        $optionClass = 'list-group-item-danger'; // Submitted and Incorrect
                                    } elseif (!$isSubmitted && $isCorrectOption) {
                                        $optionClass = 'list-group-item-info'; // Not submitted but Correct
                                    }
                                @endphp
                                <li class="list-group-item {{ $optionClass }}">
                                    {{ $option->option_text }}
                                    @if($isSubmitted)
                                        <span class="badge badge-pill badge-primary float-right">Your Answer</span>
                                    @endif
                                    @if($isCorrectOption && !$isSubmitted)
                                        <span class="badge badge-pill badge-success float-right">Correct Answer</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <p><strong>Your Submitted Answer(s):</strong>
                            @php
                                $submittedOptionTexts = [];
                                if ($studentAnswer) {
                                    if ($question->type == 'single' && $studentAnswer->option_id) {
                                        $submittedOptionTexts[] = $question->options->where('id', $studentAnswer->option_id)->first()->option_text ?? 'N/A';
                                    } elseif ($question->type == 'multiple' && $studentAnswer->option_ids) {
                                        foreach ($studentAnswer->option_ids as $optId) {
                                            $submittedOptionTexts[] = $question->options->where('id', $optId)->first()->option_text ?? 'N/A';
                                        }
                                    }
                                }
                            @endphp
                            {{ implode(', ', $submittedOptionTexts) ?: 'No answer submitted' }}
                        </p>
                        <p><strong>Correct Answer(s):</strong>
                            @php
                                $correctOptionTexts = $question->options->where('is_correct', true)->pluck('option_text')->implode(', ');
                            @endphp
                            {{ $correctOptionTexts ?: 'N/A' }}
                        </p>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('student.exams.index') }}" class="btn btn-primary mt-3">Back to My Exams</a>
        </div>
    </div>
</div>
@endsection