<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(4),
            'link' => $this->faker->url(),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'posts', true),
            'thumbnail_single' => $this->faker->imageUrl(640, 480, 'posts', true),
            'user_id' => User::factory(),        
        ];
    }
}
