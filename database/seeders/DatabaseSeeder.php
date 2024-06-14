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
        // Llamar al seeder de los CRUD
        $this->call([
            // CategorySeeder::class,
            // EditorialSeeder::class,
            BookSeeder::class,
            // Otros seeders si es necesario
        ]);

        // Llamar a otros seeders si los tienes
        // $this->call(OtroSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
