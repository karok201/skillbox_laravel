<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->words(3, true),
            'largeBody' => $this->faker->paragraph,
            'shortBody' => $this->faker->sentence,
            'created_at' => now(),
            'owner_id' => 1,
            'published' => rand(0, 1),
        ];
    }
}
