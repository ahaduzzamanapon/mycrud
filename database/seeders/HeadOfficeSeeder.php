<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeadOffice;

class HeadOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HeadOffice::create([
            'address_line1' => 'Turning Point Job Aid',
            'address_line2' => 'লাসা নং-১ুর (লিলট-৪) ৫ম তলা, আখন্দ টাদড়ার, ফলট্টির গলি, মিরপুর-১০, ঢাকা',
            'phone' => '01896224211',
        ]);
    }
}
