<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Café',
            'icon' => 'cafe',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Category::factory()->create([
            'name' => 'Hamburguesas',
            'icon' => 'hamburguesa',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Category::factory()->create([
            'name' => 'Pizzas',
            'icon' => 'pizza',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Category::factory()->create([
            'name' => 'Donas',
            'icon' => 'dona',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Category::factory()->create([
            'name' => 'Pasteles',
            'icon' => 'pastel',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
        Category::factory()->create([
            'name' => 'Galletas',
            'icon' => 'galletas',
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);


    }
}