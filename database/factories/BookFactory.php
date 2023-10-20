<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "author" => fake()->name(),
            "description" => fake()->paragraph(),
            "published_date" => fake()->dateTimeBetween("-30 years", "now"),
            "user_id" => User::all()->random()->first()->id,
            "created_at" => fake()->dateTimeBetween("-6 months", "now")
        ];
    }
}
