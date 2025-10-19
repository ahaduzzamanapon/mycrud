<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ['name' => 'Bkash (Merchant) (Payment)', 'number' => '01896 22 42 00'],
            ['name' => 'Nagad (Merchant) (Payment)', 'number' => '01896 22 42 01'],
            ['name' => 'Rocket (Send Money)', 'number' => '018304502805'],
            ['name' => 'Cash in Hand (Office)', 'number' => null],
        ];

        foreach ($methods as $method) {
            PaymentMethod::create($method);
        }

        $this->command->info('Payment Methods seeded.');
    }
}