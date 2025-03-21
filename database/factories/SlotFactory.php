<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slot>
 */
class SlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = fake()->time('H:i');
        $endTime = fake()->time('H:i', $startTime);

        return [
            'schedule_id' => Schedule::factory(),
            'patient_id' => fake()->boolean(70) ? Patient::factory() : null,
            'status' => fake()->boolean(70) ? 'available' : 'booked',
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
