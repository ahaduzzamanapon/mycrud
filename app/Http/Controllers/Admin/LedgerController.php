<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ledger;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $ledgers = Ledger::all();
        return view('admin.ledgers.index', compact('ledgers'));
    }

    public function create()
    {
        return view('admin.ledgers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ledgers',
            'type' => 'required|in:debit,credit',
            'description' => 'nullable|string',
        ]);

        Ledger::create($request->all());

        return redirect()->route('admin.ledgers.index')->with('success', 'Ledger created successfully.');
    }

    public function edit(Ledger $ledger)
    {
        return view('admin.ledgers.edit', compact('ledger'));
    }

    public function update(Request $request, Ledger $ledger)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ledgers,name,' . $ledger->id,
            'type' => 'required|in:debit,credit',
            'description' => 'nullable|string',
        ]);

        $ledger->update($request->all());

        return redirect()->route('admin.ledgers.index')->with('success', 'Ledger updated successfully.');
    }

    public function destroy(Ledger $ledger)
    {
        $ledger->delete();
        return redirect()->route('admin.ledgers.index')->with('success', 'Ledger deleted successfully.');
    }
}