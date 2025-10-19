@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Answer Paper for {{ $result->student->name }} - {{ $result->exam->name }}</h4>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Student:</strong> {{ $result->student->name }}</p>
                <p><strong>Exam:</strong> {{ $result->exam->name }}</p>
                <p><strong>Question Paper:</strong> {{ $result->exam->questionPaper->name ?? 'N/A' }}</p>
                <p><strong>Total Score:</strong> {{ $result->score }} / {{ $result->total_marks }}</p>
                <hr>

                @foreach($result->exam->questionPaper->questions as $key => $question)
                    <div class="card mb-3 {{ $studentAnswersMap[$question->id]->is_correct ? 'border-success' : 'border-danger' }}">
                        <div class="card-header">
                            Question {{ $key + 1 }}: {{ $question->question_text }} ({{ $question->pivot->marks }} Marks)
                            <span class="float-right">
                                @if($studentAnswersMap[$question->id]->is_correct)
                                    <span class="badge badge-success">Correct ({{ $studentAnswersMap[$question->id]->marks_obtained }} Marks)</span>
                                @else
                                    <span class="badge badge-danger">Incorrect ({{ $studentAnswersMap[$question->id]->marks_obtained }} Marks)</span>
                                @endif
                            </span>
                        </div>
                        <div class="card-body">
                            <h6>Options:</h6>
                            <ul class="list-group mb-3">
                                @foreach($question->options as $option)
                                    @php
                                        $isSubmitted = false;
                                        if ($question->type == 'single') {
                                            $isSubmitted = ($studentAnswersMap[$question->id]->option_id == $option->id);
                                        } else {
                                            $isSubmitted = in_array($option->id, $studentAnswersMap[$question->id]->option_ids ?? []);
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
                                    if ($question->type == 'single' && $studentAnswersMap[$question->id]->option_id) {
                                        $submittedOptionTexts[] = $question->options->where('id', $studentAnswersMap[$question->id]->option_id)->first()->option_text ?? 'N/A';
                                    } elseif ($question->type == 'multiple' && $studentAnswersMap[$question->id]->option_ids) {
                                        foreach ($studentAnswersMap[$question->id]->option_ids as $optId) {
                                            $submittedOptionTexts[] = $question->options->where('id', $optId)->first()->option_text ?? 'N/A';
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

                <a href="{{ route('admin.exam_results.index') }}" class="btn btn-secondary mt-3">Back to Results</a>
            </div>
        </div>
    </div>
</div>
@endsection
