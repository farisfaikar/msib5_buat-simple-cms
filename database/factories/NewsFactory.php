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
        $content = fake()->paragraph();

        $words = str_word_count(strip_tags($content)); // Count words in the content

        $averageWordsPerMinute = 200;

        $readTime = ceil($words / $averageWordsPerMinute);

        return [
            "uuid" => fake()->uuid(),
            "headline" => fake()->sentence(),
            "image" => fake()->imageUrl(),
            "user_uuid" => User::where('role', 'admin')->inRandomOrder()->first()->uuid,
            "content" => fake()->paragraph(),
            "read_time" => $readTime,
        ];
    }
}
