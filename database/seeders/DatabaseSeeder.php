<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Admin",
            "email" => "admin@residencely.net",
            "password" => Hash::make("password"),
        ]);

        $this->call([
            PropertySeeder::class,
            ImageSeeder::class,
        ]);

        Image::factory(5)->create();
    }
}
