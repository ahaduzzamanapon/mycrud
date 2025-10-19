<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ledger;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AccountReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function report(Request $request)
    {
        $ledgers = Ledger::all();
        $transactions = collect(); // Empty collection by default

        if ($request->isMethod('post')) {
            $query = Transaction::with('ledger');

            if ($request->filled('date_from')) {
                $query->where('date', '>=', $request->date_from);
            }

            if ($request->filled('date_to')) {
                $query->where('date', '<=', $request->date_to);
            }

            if ($request->filled('type')) {
                $query->where('type', $request->type);
            }

            if ($request->filled('ledger_id')) {
                $query->where('ledger_id', $request->ledger_id);
            }

            $transactions = $query->get();

            if ($request->has('export')) {
                return $this->exportCsv($transactions);
            }
        }

        return view('admin.reports.accounts', compact('transactions', 'ledgers'));
    }

    private function exportCsv($transactions)
    {
        $fileName = 'account_report.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Date', 'Ledger', 'Type', 'Amount', 'Description'];

        $callback = function() use($transactions, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($transactions as $transaction) {
                $row['Date']  = $transaction->date;
                $row['Ledger']    = $transaction->ledger->name ?? 'N/A';
                $row['Type']    = ucfirst($transaction->type);
                $row['Amount']  = $transaction->amount;
                $row['Description'] = $transaction->description;

                fputcsv($file, array($row['Date'], $row['Ledger'], $row['Type'], $row['Amount'], $row['Description']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}