@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Generate Question Paper</h4>
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
                <form action="{{ route('admin.question_papers.generate_store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Question Paper Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="total_questions">Total Questions in Paper</label>
                        <input type="number" class="form-control" id="total_questions" name="total_questions" value="{{ old('total_questions') }}" min="1" required>
                    </div>

                    <hr>

                    <h5>Questions per Subject</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Available MCQs</th>
                                <th>Use Questions from this Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->questions_count }}</td>
                                    <td>
                                        <input type="number" class="form-control" name="subject_questions[{{ $subject->id }}]" value="{{ old('subject_questions.' . $subject->id, 0) }}" min="0" max="{{ $subject->questions_count }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>

                    <button type="submit" class="btn btn-primary">Generate Question Paper</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
