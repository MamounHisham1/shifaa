<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = fake()->time('H:i:s');
        $endTime = fake()->time('H:i:s', strtotime($startTime) + 60 * 60 * 2);

        return [
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'slot_by_min' => fake()->numberBetween(1, 60),
            'day' => fake()->dayOfWeek(),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'is_available' => fake()->boolean(80),
            'status' => fake()->randomElement(['active', 'inactive', 'cancelled']),
            'notes' => fake()->optional()->sentence(10),
            'max_appointments' => fake()->numberBetween(5, 20),
        ];
    }
}
