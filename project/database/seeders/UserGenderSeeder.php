<?php

namespace Database\Seeders;

use App\Models\UserGender;
use Database\Factories\UserGenderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserGender::factory()->create([
            'name' => 'Male',
            'title' => 'Mr',
        ]);
    }
}
