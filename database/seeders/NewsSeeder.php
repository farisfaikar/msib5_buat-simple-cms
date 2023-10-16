<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            "headline" => "Breaking News One",
            "content" => fake()->realTextBetween(200, 1000),
            "image" => fake()->imageUrl(800, 400),
            "user_uuid" => User::inRandomOrder()->first()->uuid
        ]);
    }
}
