<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'text' => $this->faker->realText(150),
            'image' => $this->faker->imageUrl(600, 340),
            'tag_id' => random_int(1,5),

        ];
    }
}
