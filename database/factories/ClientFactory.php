<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone' => $this->faker->phoneNumber,
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'service_id' => random_int(1,4),
        ];
    }
}
