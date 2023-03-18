<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@correo.com',
            'admin' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Cliente',
            'email' => 'correo@correo.com',
        ]);


        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
