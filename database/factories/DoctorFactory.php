<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
            'speciality' => fake()->randomElement(['Cardiologist', 'Orthopedic Surgeon', 'Neurologist', 'Dermatologist', 'Pediatrician', 'Psychiatrist', 'Gynecologist', 'General Surgeon']),
            'qualification' => fake()->randomElement(['MBBS', 'MD', 'MBBS, MD', 'MBBS, MS', 'PhD in Medicine']),
            'experience' => fake()->numberBetween(1, 50),
            'available_days' => fake()->randomElement(['Monday, Wednesday, Friday', 'Tuesday, Thursday, Saturday', 'Monday to Friday']),
            'consultation_fee' => fake()->numberBetween(100, 10000),
            'license_number' => fake()->unique()->bothify('LIC-#####-####'),
            'bio' => fake()->paragraph(3),
            'status' => fake()->randomElement(['active', 'inactive', 'on leave']),
        ];
    }
}
