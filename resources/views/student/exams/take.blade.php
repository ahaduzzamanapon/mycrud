<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Exam: {{ $exam->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }
        .exam-container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 900px;
            animation: fadeIn 0.5s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h4 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
            text-align: center;
        }
        h5 {
            font-size: 1.3rem;
            font-weight: 500;
            color: #555;
            margin-bottom: 15px;
        }
        p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .question-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            background-color: #fdfdfd;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .options-container .form-check {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .options-container .form-check:hover {
            background-color: #f0f2f5;
            border-color: #cce5ff;
        }
        .options-container .form-check-input {
            margin-top: 0.3rem;
            margin-left: -1.5rem;
        }
        .options-container .form-check-label {
            margin-left: 0.5rem;
            cursor: pointer;
            width: calc(100% - 2rem);
        }
        .question-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .timer {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e53935;
            text-align: center;
            margin-bottom: 30px;
            padding: 10px 20px;
            background-color: #ffebee;
            border-radius: 10px;
            border: 1px solid #ef9a9a;
        }
        .btn-primary, .btn-success {
            background-color: #e53935;
            border-color: #e53935;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover, .btn-success:hover {
            background-color: #c62828;
            border-color: #c62828;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        /* Strict Mode Styles */
        body.strict-mode {
            overflow: hidden;
        }
        .strict-mode-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.95);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            text-align: center;
            z-index: 9999;
            display: none; /* Hidden by default */
        }
        .strict-mode-overlay p {
            font-size: 1.5rem;
            margin-top: 20px;
        }
    </style>
</head>
<body class="strict-mode">
    <div class="strict-mode-overlay" id="strict-mode-overlay">
        Please stay on the exam page.
        <p>Attempting to leave the exam window may result in automatic submission or disqualification.</p>
    </div>

    <div class="exam-container">
        <div class="timer" id="exam-timer"></div>
        <h4 class="mb-4">{{ $exam->name }}</h4>
        <form id="exam-form" action="{{ route('student.exams.submit', $exam->id) }}" method="POST">
            @csrf
            <div id="questions-display">
                @foreach($exam->questionPaper->questions as $key => $question)
                    <div class="question-card" id="question-{{ $question->id }}" style="display: {{ $key == 0 ? 'block' : 'none' }};">
                        <h5>Question {{ $key + 1 }} ({{ $question->pivot->marks }} Marks)</h5>
                        <p>{{ $question->question_text }}</p>
                        <div class="options-container">
                            @foreach($question->options as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="{{ $question->type == 'single' ? 'radio' : 'checkbox' }}" 
                                           name="answers[{{ $question->id }}]{{ $question->type == 'multiple' ? '[]' : '' }}" 
                                           id="option-{{ $option->id }}" value="{{ $option->id }}">
                                    <label class="form-check-label" for="option-{{ $option->id }}">
                                        {{ $option->option_text }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="question-navigation">
                <button type="button" class="btn btn-secondary" id="prev-question" style="display: none;">Previous</button>
                <button type="button" class="btn btn-primary" id="next-question">Next</button>
                <button type="submit" class="btn btn-success" id="submit-exam" style="display: none;">Submit Exam</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const examEndTime = new Date(@json($exam->end_time));
        let currentQuestionIndex = 0;
        const questions = document.querySelectorAll('.question-card');
        const prevBtn = document.getElementById('prev-question');
        const nextBtn = document.getElementById('next-question');
        const submitBtn = document.getElementById('submit-exam');
        const examTimer = document.getElementById('exam-timer');
        const examForm = document.getElementById('exam-form');
        const strictModeOverlay = document.getElementById('strict-mode-overlay');

        function showQuestion(index) {
            questions.forEach((q, i) => {
                q.style.display = (i === index) ? 'block' : 'none';
            });
            prevBtn.style.display = (index === 0) ? 'none' : 'inline-block';
            nextBtn.style.display = (index === questions.length - 1) ? 'none' : 'inline-block';
            submitBtn.style.display = (index === questions.length - 1) ? 'inline-block' : 'none';
        }

        function updateTimer() {
            const now = new Date();
            const timeLeft = examEndTime.getTime() - now.getTime();

            if (timeLeft <= 0) {
                examTimer.textContent = `Time's Up!`;
                clearInterval(timerInterval);
                examForm.submit(); // Auto-submit exam
                return;
            }

            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            examTimer.textContent = `Time Left: ${hours}h ${minutes}m ${seconds}s`;
        }

        prevBtn.addEventListener('click', () => {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion(currentQuestionIndex);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
            }
        });

        // Strict Mode Enforcement
        function enableStrictMode() {
            document.documentElement.requestFullscreen();
            window.addEventListener('blur', () => {
                strictModeOverlay.style.display = 'flex';
            });
            window.addEventListener('focus', () => {
                strictModeOverlay.style.display = 'none';
            });
            // Disable right-click
            document.addEventListener('contextmenu', e => e.preventDefault());
            // Disable common keyboard shortcuts
            document.addEventListener('keydown', e => {
                if (e.key === 'F11' || (e.ctrlKey && e.key === 't') || (e.altKey && e.key === 'Tab')) {
                    e.preventDefault();
                }
            });
        }

        // Start exam logic
        showQuestion(currentQuestionIndex);
        const timerInterval = setInterval(updateTimer, 1000);
        enableStrictMode();
    });
    </script>
</body>
</html>