@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Manage Batches for {{ $student->name }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.students.assign_batches', $student->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Select Batches</label>
                        @foreach($batches as $batch)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="batches[]" value="{{ $batch->id }}" id="batch-{{ $batch->id }}" {{ in_array($batch->id, $assignedBatches) ? 'checked' : '' }}>
                                <label class="form-check-label" for="batch-{{ $batch->id }}">
                                    {{ $batch->course->name ?? 'N/A' }} - {{ $batch->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Update Assignments</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
