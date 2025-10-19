@extends('layouts.student')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Enroll in a New Course</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('student.enroll.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="course_id">Select Course</label>
                    <select class="form-control" id="course_id" name="course_id" required>
                        <option value="">-- Select a Course --</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" data-fees="{{ $course->fees }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="batch_id">Select Batch</label>
                    <select class="form-control" id="batch_id" name="batch_id" required>
                        <option value="">-- Select a Course First --</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" step="0.01" class="form-control" id="amount" name="amount" readonly required>
                </div>

                <div class="form-group">
                    <label for="payment_method_id">Payment Method</label>
                    <select class="form-control" id="payment_method_id" name="payment_method_id" required>
                        @foreach($paymentMethods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }} - {{ $method->number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="transaction_number">Transaction Number</label>
                    <input type="text" class="form-control" id="transaction_number" name="transaction_number" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Your Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Enrollment Request</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const courseSelect = document.getElementById('course_id');
        const batchSelect = document.getElementById('batch_id');
        const amountInput = document.getElementById('amount');
        const allBatches = @json($batches);

        courseSelect.addEventListener('change', function () {
            const selectedCourseId = this.value;
            const selectedOption = this.options[this.selectedIndex];
            const fees = selectedOption.getAttribute('data-fees');

            // Clear previous options
            batchSelect.innerHTML = '<option value="">-- Select a Batch --</option>';
            amountInput.value = fees || '';

            if (selectedCourseId) {
                const filteredBatches = allBatches.filter(batch => batch.course_id == selectedCourseId);
                filteredBatches.forEach(batch => {
                    const option = document.createElement('option');
                    option.value = batch.id;
                    option.textContent = batch.name;
                    batchSelect.appendChild(option);
                });
            }
        });
    });
</script>
@endpush
