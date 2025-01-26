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
        $startTime = fake()->time('H:i:s'); // Random start time before 5 PM
        $endTime = fake()->time('H:i:s', strtotime($startTime) + 60 * 60 * 2); // Add 2 hours to start time

        return [
            'doctor_id' => Doctor::inRandomOrder()->first()->id, // Random doctor ID
            'date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Date within the next month
            'start_time' => $startTime, // Random start time
            'end_time' => $endTime, // Corresponding end time
            'is_available' => fake()->boolean(80), // 80% chance the schedule is available
            'status' => fake()->randomElement(['active', 'inactive', 'cancelled']), // Schedule status
            'notes' => fake()->optional()->sentence(10), // Random notes or null
            'max_appointments' => fake()->optional()->numberBetween(5, 20), // Random max appointments or null
        ];
    }
}
