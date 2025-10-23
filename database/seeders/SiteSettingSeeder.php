<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sitesettings')->insert([
            'name' => 'Turning Point',
            'slogan' => 'Job Preparation Platform',
            'logo' => 'logo.png',
            'marquee_text' => 'Welcome to Turning Point, your one-stop solution for job preparation!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}