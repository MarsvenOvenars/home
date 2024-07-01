<?php

namespace Database\Seeders;

use App\Models\Styleinterior;
use App\Models\Home;
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
        User::factory()
            ->count(10)
            ->create();

        $this->call([
            LocationSeeder::class,
            StyleinteriorSeeder::class,
            ColorSeeder::class,
            YearSeeder::class,
        ]);

        Home::factory()
            ->count(1000)
            ->create();
    }
}
