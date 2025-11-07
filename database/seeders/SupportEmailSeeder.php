<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SupportEmail;

class SupportEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupportEmail::create([
            'title' => 'info@turningandtargetpoint.com',
            'email' => 'info@turningandtargetpoint.com',
        ]);

        SupportEmail::create([
            'title' => 'support@turningandtargetpoint.com',
            'email' => 'support@turningandtargetpoint.com',
        ]);

        SupportEmail::create([
            'title' => 'admission@turningandtargetpoint.com',
            'email' => 'admission@turningandtargetpoint.com',
        ]);

        SupportEmail::create([
            'title' => 'contact@turningandtargetpoint.com',
            'email' => 'contact@turningandtargetpoint.com',
        ]);
    }
}
