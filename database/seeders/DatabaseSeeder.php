<?php

namespace Database\Seeders;

use App\Models\Cafe;
use App\Models\Category;
use App\Models\Food;
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
        // \App\Models\User::factory(10)->create();
        Cafe::factory()->count(5)->create();
        Category::factory()->count(40)->create();
        Food::factory()->count(40)->create();
    }
}
