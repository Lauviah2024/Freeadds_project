<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\Categorie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Categorie::factory(3)->create();

        Ads::factory(2)->create();

        User::factory()->create([
            'name' => 'Test User',
            'login' => 'alexis',
            'email' => 'georges.ayeni@epitech.eu',
        ]);
    }
}
