<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ads>
 */
class AdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'image' => "https://www.shutterstock.com/image-photo/cat-yellow-face-sitting-on-600nw-2470054451.jpg",
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Categorie::factory(),
            'location' => 2000
        ];
    }
}
