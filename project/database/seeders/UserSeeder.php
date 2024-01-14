<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Susheel Singh',
            'email' => 'susheelkrsingh306@gmail.com',
            'designation' => 'Owner',
        ]);
    }
}