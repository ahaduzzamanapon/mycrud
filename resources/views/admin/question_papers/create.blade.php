@extends('layouts.default')

@section('content')
<style>
    .draggable-question {
        cursor: grab;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        margin-bottom: 5px;
        padding: 10px;
        border-radius: 5px;
        transition: border-color 0.2s ease;
    }
    .draggable-question.dragging {
        opacity: 0.5;
        border: 2px dashed #007bff;
    }
    #selected-questions {
        min-height: 100px; /* Ensure it's always visible */
        border: 2px dashed #ccc;
        padding: 10px;
        border-radius: 5px;
        transition: border-color 0.2s ease, background-color 0.2s ease;
    }
    #selected-questions.drag-over {
        border-color: #28a745;
        background-color: #e6ffe6;
    }
    .selected-question-item {
        background-color: #e9f7ef;
        border: 1px solid #c3e6cb;
        margin-bottom: 5px;
        padding: 10px;
        border-radius: 5px;
    }
    .empty-drop-target-message {
        color: #6c757d;
        text-align: center;
        padding: 20px;
    }
</style>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Create Question Paper</h4>
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
                <form action="{{ route('admin.question_papers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Question Paper Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <hr>

                    <h5>Select Questions</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Available Questions</h5>
                                    <div class="form-group mb-0">
                                        <label for="subject_filter">Filter by Subject</label>
                                        <select class="form-control" id="subject_filter">
                                            <option value="">All Subjects</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                                    <ul id="available-questions" class="list-group">
                                        @foreach($questions as $question)
                                            <li class="list-group-item draggable-question" draggable="true" data-id="{{ $question->id }}" data-subject-id="{{ $question->subject_id }}">
                                                {{ $question->question_text }} ({{ $question->subject->name ?? 'No Subject' }})
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Selected Questions</h5>
                                    <p class="mb-0">Total Questions: <span id="total-questions">0</span></p>
                                    <p class="mb-0">Total Marks: <span id="total-marks">0</span></p>
                                </div>
                                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                                    <ul id="selected-questions" class="list-group">
                                        <li class="list-group-item empty-drop-target-message">Drag questions here</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary">Create Question Paper</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const availableQuestionsList = document.getElementById('available-questions');
    const selectedQuestionsList = document.getElementById('selected-questions');
    const subjectFilter = document.getElementById('subject_filter');
    const totalQuestionsSpan = document.getElementById('total-questions');
    const totalMarksSpan = document.getElementById('total-marks');
    const emptyDropTargetMessage = selectedQuestionsList.querySelector('.empty-drop-target-message');

    let selectedQuestionsData = {}; // { question_id: { marks: X, element: DOMElement } }

    function calculateTotals() {
        let totalQuestions = 0;
        let totalMarks = 0;
        Object.values(selectedQuestionsData).forEach(q => {
            totalQuestions++;
            totalMarks += parseFloat(q.marks || 0);
        });
        totalQuestionsSpan.textContent = totalQuestions;
        totalMarksSpan.textContent = totalMarks.toFixed(2);

        if (totalQuestions > 0) {
            emptyDropTargetMessage.style.display = 'none';
        } else {
            emptyDropTargetMessage.style.display = '';
        }
    }

    function updateHiddenInputs() {
        // Clear existing hidden inputs
        document.querySelectorAll('input[name^="questions["]').forEach(input => input.remove());

        let index = 0;
        for (const qId in selectedQuestionsData) {
            const qData = selectedQuestionsData[qId];
            
            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = `questions[${index}][id]`;
            idInput.value = qId;
            selectedQuestionsList.appendChild(idInput);

            const marksInput = document.createElement('input');
            marksInput.type = 'hidden';
            marksInput.name = `questions[${index}][marks]`;
            marksInput.value = qData.marks;
            selectedQuestionsList.appendChild(marksInput);

            index++;
        }
    }

    function renderSelectedQuestion(questionId, questionText, initialMarks = 1) {
        const li = document.createElement('li');
        li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center', 'selected-question-item');
        li.dataset.id = questionId;
        li.innerHTML = `
            <span>${questionText}</span>
            <div class="d-flex align-items-center">
                <input type="number" step="0.5" min="0.5" class="form-control form-control-sm mr-2 question-marks" style="width: 80px;" value="${initialMarks}">
                <button type="button" class="btn btn-sm btn-danger remove-selected-question">Remove</button>
            </div>
        `;

        const marksInput = li.querySelector('.question-marks');
        marksInput.addEventListener('change', function() {
            selectedQuestionsData[questionId].marks = this.value;
            calculateTotals();
            updateHiddenInputs();
        });

        li.querySelector('.remove-selected-question').addEventListener('click', function() {
            delete selectedQuestionsData[questionId];
            li.remove();
            calculateTotals();
            updateHiddenInputs();
            // Make the original question draggable again
            const originalQuestion = availableQuestionsList.querySelector(`.draggable-question[data-id="${questionId}"]`);
            if (originalQuestion) {
                originalQuestion.style.display = '';
            }
        });

        selectedQuestionsList.appendChild(li);
        selectedQuestionsData[questionId] = { marks: initialMarks, element: li };
        calculateTotals();
        updateHiddenInputs();
    }

    // Drag and Drop functionality
    let draggedItem = null;

    availableQuestionsList.addEventListener('dragstart', function(e) {
        if (e.target.classList.contains('draggable-question')) {
            draggedItem = e.target;
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/plain', e.target.dataset.id);
            setTimeout(() => {
                e.target.classList.add('dragging');
            }, 0);
        }
    });

    availableQuestionsList.addEventListener('dragend', function(e) {
        if (e.target.classList.contains('draggable-question')) {
            e.target.classList.remove('dragging');
        }
    });

    selectedQuestionsList.addEventListener('dragover', function(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
    });

    selectedQuestionsList.addEventListener('dragenter', function(e) {
        e.preventDefault();
        selectedQuestionsList.classList.add('drag-over');
    });

    selectedQuestionsList.addEventListener('dragleave', function() {
        selectedQuestionsList.classList.remove('drag-over');
    });

    selectedQuestionsList.addEventListener('drop', function(e) {
        e.preventDefault();
        selectedQuestionsList.classList.remove('drag-over');
        if (draggedItem) {
            const questionId = draggedItem.dataset.id;
            const questionText = draggedItem.textContent.split(' (')[0]; // Extract text before subject

            if (!selectedQuestionsData[questionId]) {
                renderSelectedQuestion(questionId, questionText);
            }
            draggedItem = null;
        }
    });

    // Filter functionality
    subjectFilter.addEventListener('change', function() {
        const selectedSubjectId = this.value;
        document.querySelectorAll('.draggable-question').forEach(question => {
            const questionSubjectId = question.dataset.subjectId;
            if (selectedSubjectId === '' || questionSubjectId === selectedSubjectId) {
                question.style.display = '';
            } else {
                question.style.display = 'none';
            }
            // Hide if already selected
            if (selectedQuestionsData[question.dataset.id]) {
                question.style.display = 'none';
            }
        });
    });

    // Initial filter application
    subjectFilter.dispatchEvent(new Event('change'));
});
</script>
@endpush
