@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add New Frontend Manager Course</h4>
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
                <form action="{{ route('admin.frontend_manager_courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="branch_id">Branch</label>
                        <select class="form-control" id="branch_id" name="branch_id" required>
                            <option value="">Select Branch</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="real_amount">Real Amount</label>
                        <input type="number" step="0.01" class="form-control" id="real_amount" name="real_amount" value="{{ old('real_amount') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="discount_amount">Discount Amount</label>
                        <input type="number" step="0.01" class="form-control" id="discount_amount" name="discount_amount" value="{{ old('discount_amount') }}">
                    </div>
                    <div class="form-group">
                        <label for="offer_expire_date">Offer Expire Date</label>
                        <input type="datetime-local" class="form-control" id="offer_expire_date" name="offer_expire_date" value="{{ old('offer_expire_date') }}">
                    </div>
                    <div class="form-group">
                        <label for="course_duration">Course Duration</label>
                        <input type="text" class="form-control" id="course_duration" name="course_duration" value="{{ old('course_duration') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="total_lecture">Total Lecture</label>
                        <input type="number" class="form-control" id="total_lecture" name="total_lecture" value="{{ old('total_lecture') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="total_exam">Total Exam</label>
                        <input type="number" class="form-control" id="total_exam" name="total_exam" value="{{ old('total_exam') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="live_class">Live Class</label>
                        <input type="text" class="form-control" id="live_class" name="live_class" value="{{ old('live_class') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="course_includes">Course Includes (one per line)</label>
                        <textarea class="form-control" id="course_includes" name="course_includes" rows="5">{{ old('course_includes') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control ckeditor-editor" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="instructors">Instructors (one per line)</label>
                        <textarea class="form-control" id="instructors" name="instructors" rows="5">{{ old('instructors') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="routine">Routine</label>
                        <textarea class="form-control ckeditor-editor" id="routine" name="routine" rows="5">{{ old('routine') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const branchSelect = document.getElementById('branch_id');
        const categorySelect = document.getElementById('category_id');

        function loadCategories(branchId) {
            if (branchId) {
                fetch(`/admin/api/branches/${branchId}/categories`)
                    .then(response => response.json())
                    .then(data => {
                        categorySelect.innerHTML = '<option value="">Select Category</option>';
                        data.forEach(category => {
                            const option = document.createElement('option');
                            option.value = category.id;
                            option.textContent = category.name;
                            if ({{ old('category_id', 'null') }} == category.id) {
                                option.selected = true;
                            }
                            categorySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching categories:', error));
            } else {
                categorySelect.innerHTML = '<option value="">Select Category</option>';
            }
        }

        branchSelect.addEventListener('change', function () {
            loadCategories(this.value);
        });

        // Initial load if an old branch_id is present
        if (branchSelect.value) {
            loadCategories(branchSelect.value);
        }
    });
</script>
@endpush
@endsection
