@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add New MCQ</h4>
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
                <form action="{{ route('admin.mcqs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question_text">Question Text</label>
                        <textarea class="form-control" id="question_text" name="question_text" rows="3" required>{{ old('question_text') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="subject_id">Subject</label>
                        <select class="form-control" id="subject_id" name="subject_id" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Answer Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="single">Single Answer</option>
                            <option value="multiple">Multiple Answers</option>
                        </select>
                    </div>

                    <hr>

                    <h5>Options</h5>
                    <div id="options-container">
                        <!-- Options will be added here dynamically -->
                    </div>
                    <button type="button" class="btn btn-secondary mt-2" id="add-option">Add Option</button>

                    <hr>

                    <button type="submit" class="btn btn-primary">Save MCQ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const addOptionBtn = document.getElementById('add-option');
    const optionsContainer = document.getElementById('options-container');
    const questionTypeSelect = document.getElementById('type');
    let optionIndex = 0;

    function getAnswerInputName() {
        return questionTypeSelect.value === 'single' ? 'correct_answer' : 'correct_answer[]';
    }

    function getAnswerInputType() {
        return questionTypeSelect.value === 'single' ? 'radio' : 'checkbox';
    }

    function addOption() {
        const answerInputType = getAnswerInputType();
        const answerInputName = getAnswerInputName();

        const optionHTML = `
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="${answerInputType}" name="${answerInputName}" value="${optionIndex}" required>
                    </div>
                </div>
                <input type="text" name="options[${optionIndex}]" class="form-control" placeholder="Option ${optionIndex + 1}" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-option">Remove</button>
                </div>
            </div>`;
        
        optionsContainer.insertAdjacentHTML('beforeend', optionHTML);
        optionIndex++;
    }

    function updateAnswerInputs() {
        const answerInputs = optionsContainer.querySelectorAll('input[name^="correct_answer"]');
        const newType = getAnswerInputType();
        const newName = getAnswerInputName();
        
        answerInputs.forEach(input => {
            input.type = newType;
            input.name = newName;
        });
    }

    addOptionBtn.addEventListener('click', addOption);

    questionTypeSelect.addEventListener('change', updateAnswerInputs);

    // Event delegation for remove buttons
    optionsContainer.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-option')) {
            e.target.closest('.input-group').remove();
        }
    });

    // Add initial options
    addOption();
    addOption();
});
</script>
@endpush
