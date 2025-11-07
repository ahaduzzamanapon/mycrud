<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutLink;

class AboutLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutLink::create([
            'title' => 'About Us',
            'url' => '/about',
        ]);

        AboutLink::create([
            'title' => 'Career',
            'url' => '#',
        ]);

        AboutLink::create([
            'title' => 'Branches',
            'url' => '/branches',
        ]);
    }
}
