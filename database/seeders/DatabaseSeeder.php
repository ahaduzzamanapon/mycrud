<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        SiteSettingSeeder::class,
        AboutLinkSeeder::class,
        SupportEmailSeeder::class,
        HeadOfficeSeeder::class,
        CorporateOfficeSeeder::class,
          //UserSeeder::class,
          //CourseAndBatchSeeder::class,
          //StudentSeeder::class,
          //SubjectSeeder::class,
          //LedgerSeeder::class,
          //TransactionSeeder::class,
          //AttendanceSeeder::class,
          //PaymentMethodSeeder::class,
          //McqSeeder::class,
        ]);
    }
}
