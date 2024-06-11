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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        Product::factory(200)->create();

        $this->call(UserSeeder::class);
        $this->call(Type_AttachmentsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(LineSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PartnerSeeder::class);
    }
}
