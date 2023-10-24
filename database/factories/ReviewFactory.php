<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $book = Book::all()->random()->first();

        return [
            "title" => fake()->sentence(3),
            "message" => fake()->sentence(5),
            "rating" => fake()->numberBetween(0, 5),
            "user_id" => User::all()->random()->id,
            "book_id" => $book->id,
            "created_at" => fake()->dateTimeBetween($book->created_at, "now")
        ];
    }
}
