<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the main admin user
        User::create([
            'name'  => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'user_type' => 'admin',
        ]);

        // Create a few employee users
        User::factory()->employee()->count(5)->create();

        $this->command->info('Admin and employee accounts created.');
    }
}