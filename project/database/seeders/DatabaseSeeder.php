<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserGenderSeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(InvoiceProductSeeder::class);

    }
}
