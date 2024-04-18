<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id');
        $categoryIds = Category::pluck('id');

        return [
            'title' => fake()->sentence,
            'content' => fake()->paragraph,
            'user_id' => fake()->randomElement($userIds),
            'category_id' => fake()->randomElement($categoryIds),
        ];
    }
}
