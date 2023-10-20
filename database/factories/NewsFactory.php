<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = fake()->realTextBetween(100, 10000);
        $words = str_word_count(strip_tags($content)); // Count words in the content
        $averageWordsPerMinute = 200;
        $readTime = ceil($words / $averageWordsPerMinute);

        return [
            "uuid" => fake()->uuid(),
            "headline" => fake()->realTextBetween(10, 50),
            "image" => fake()->imageUrl(),
            "user_uuid" => User::where('role', 'admin')->inRandomOrder()->first()->uuid,
            "content" => $content,
            "read_time" => $readTime,
        ];
    }
}
