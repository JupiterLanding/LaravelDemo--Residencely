<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Voucher;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@residencely.net',
            'password' => Hash::make('password'),
        ]);

        Voucher::create([
            "code" => Str::upper(Str::random(8)),
            "discount_percent" => 35,
            "user_id" => $user->id,
        ]);

        $this->call([
            PropertySeeder::class,
            ImageSeeder::class,
        ]);

        Image::factory(5)->create();
    }
}
