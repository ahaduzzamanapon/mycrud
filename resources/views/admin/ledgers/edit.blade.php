@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Ledger</h4>
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
                <form action="{{ route('admin.ledgers.update', $ledger->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Ledger Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $ledger->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="debit" {{ $ledger->type == 'debit' ? 'selected' : '' }}>Debit</option>
                            <option value="credit" {{ $ledger->type == 'credit' ? 'selected' : '' }}>Credit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $ledger->description) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Ledger</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
