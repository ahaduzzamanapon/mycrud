<?php

namespace Database\Seeders;

use App\Models\Ledger;
use Illuminate\Database\Seeder;

class LedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ledgers = [
            ['name' => 'Course Fees', 'type' => 'credit', 'description' => 'Income from student course fees'],
            ['name' => 'Office Supplies', 'type' => 'debit', 'description' => 'Expenses for office supplies'],
            ['name' => 'Salaries', 'type' => 'debit', 'description' => 'Employee salary expenses'],
            ['name' => 'Utilities', 'type' => 'debit', 'description' => 'Expenses for utilities like electricity and internet'],
            ['name' => 'Miscellaneous Income', 'type' => 'credit', 'description' => 'Other sources of income'],
        ];

        foreach ($ledgers as $ledger) {
            Ledger::create($ledger);
        }

        $this->command->info('Ledgers created.');
    }
}