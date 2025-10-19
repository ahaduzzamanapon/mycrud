<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ledger;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function create()
    {
        $ledgers = Ledger::all();
        return view('admin.transactions.create', compact('ledgers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ledger_id' => 'required|exists:ledgers,id',
            'date' => 'required|date',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Transaction::create($request->all());

        return redirect()->route('admin.transactions.create')->with('success', 'Transaction recorded successfully.');
    }
}