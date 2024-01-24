<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Susheel Singh',
            'email' => 'susheelkrsingh306@gmail.com',
            'designation' => 'Owner',
            'password' => Hash::make('sffggJJGJgj_gh6482')
        ]);
    }
}