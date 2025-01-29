<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'avatar' => fake()->imageUrl(300, 300, 'people', true),
            'country' => fake()->country(),
            'state' => fake()->state(),
            'city' => fake()->city(),
            'street' => fake()->streetAddress(),
        ];
    }
}
