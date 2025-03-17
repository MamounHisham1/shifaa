<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Faker\Provider\UserAgent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory(),
            'blood_group' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'weight' => fake()->randomFloat(1, 40, 120),
            'height' => fake()->randomFloat(2, 1.5, 2.1),
            'allergies' => fake()->randomElement(['Peanuts', 'Shellfish', 'Dairy', 'Pollen', null]),
            'medications' => fake()->word(),
            'surgeries' => fake()->randomElement(['Appendectomy', 'C-Section', 'Knee Surgery', 'Heart Bypass', null]),
            'diseases' => fake()->randomElement(['Hypertension', 'Diabetes', 'Asthma', null]),
            'family_history' => fake()->randomElement(['Cancer', 'Heart Disease', 'Diabetes', null]),
            'emergency_contact_name' => fake()->name(),
            'emergency_contact_phone' => fake()->phoneNumber(),
            'emergency_contact_relationship' => fake()->randomElement(['Mother', 'Father', 'Spouse', 'Friend', 'Sibling']),
        ];
    }
}
