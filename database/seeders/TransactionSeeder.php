<?php

namespace Database\Seeders;

use App\Models\Ledger;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creditLedgers = Ledger::where('type', 'credit')->get();
        $debitLedgers = Ledger::where('type', 'debit')->get();

        if ($creditLedgers->isEmpty() || $debitLedgers->isEmpty()) {
            $this->command->error('Please run the LedgerSeeder first!');
            return;
        }

        // Create 20 income transactions
        for ($i = 0; $i < 20; $i++) {
            Transaction::create([
                'ledger_id' => $creditLedgers->random()->id,
                'date' => now()->subDays(rand(0, 365)),
                'type' => 'income',
                'amount' => rand(1000, 5000),
                'description' => 'Sample income transaction',
            ]);
        }

        // Create 30 expense transactions
        for ($i = 0; $i < 30; $i++) {
            Transaction::create([
                'ledger_id' => $debitLedgers->random()->id,
                'date' => now()->subDays(rand(0, 365)),
                'type' => 'expense',
                'amount' => rand(100, 2000),
                'description' => 'Sample expense transaction',
            ]);
        }

        $this->command->info('Transactions created.');
    }
}