<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
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
        return [
            'review' => fake()->realText(200),
            'was_helpful' => rand(0, 50),
            'user_id' => User::getRandomUserId()->id,
            'product_id' => Product::getRandomProductId()->id,
        ];
    }
}
