@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Account Report</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reports.accounts') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_from">Date From</label>
                                <input type="date" class="form-control" name="date_from" value="{{ request('date_from') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_to">Date To</label>
                                <input type="date" class="form-control" name="date_to" value="{{ request('date_to') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" class="form-control">
                                    <option value="">All</option>
                                    <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>Income</option>
                                    <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>Expense</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ledger_id">Ledger</label>
                                <select name="ledger_id" class="form-control">
                                    <option value="">All</option>
                                    @foreach($ledgers as $ledger)
                                        <option value="{{ $ledger->id }}" {{ request('ledger_id') == $ledger->id ? 'selected' : '' }}>{{ $ledger->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <button type="submit" name="export" value="1" class="btn btn-success">Export</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Ledger</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($transactions) > 0)
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->date }}</td>
                                        <td>{{ $transaction->ledger->name ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($transaction->type) }}</td>
                                        <td>{{ number_format($transaction->amount, 2) }}</td>
                                        <td>{{ $transaction->description }}</td>
                                    </tr>
                                @endforeach
                            @else
                                @if(request()->isMethod('post'))
                                <tr>
                                    <td colspan="5" class="text-center">No records found.</td>
                                </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
