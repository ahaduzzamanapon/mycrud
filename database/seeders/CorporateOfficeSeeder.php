<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CorporateOffice;

class CorporateOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorporateOffice::create([
            'address_line1' => 'Turning Point Job Aid',
            'address_line2' => 'সামাজ ম্যানত, ( লিজট-৬) ৭ম তলা, ফলট্টির গলি, মিরপুর-১০, ঢাকা',
            'phone' => '01896224210',
        ]);
    }
}
