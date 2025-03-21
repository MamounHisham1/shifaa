<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::inRandomOrder()->first()->id,
            'schedule_id' => Schedule::inRandomOrder()->first()->id,
            'status' => fake()->randomElement(['scheduled', 'completed', 'canceled', 'no-show']),
            'reason_for_visit' => fake()->sentence(10),
            'type' => fake()->randomElement(['in-person', 'virtual']),
            'visit_type' => fake()->randomElement(['new', 'follow-up']),
            'notes' => fake()->optional()->paragraph(),
            'cancellation_reason' => fake()->optional()->sentence(),
        ];
    }
}
