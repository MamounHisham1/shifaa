<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialty>
 */
class SpecialtyFactory extends Factory
{
    private static $counter = 0;
    
    private static $specialties = [
        'Cardiologist',
        'Orthopedic Surgeon',
        'Neurologist',
        'Dermatologist',
        'Pediatrician',
        'Psychiatrist',
        'Gynecologist',
        'General Surgeon',
        'General Physician',
        'Dentist',
        'ENT Specialist',
        'Urologist',
        'Psychologist',
        'Endocrinologist',
        'Hematologist',
        'Immunologist',
        'Nephrologist',
        'Pulmonologist',
        'Rheumatologist',
        'Gastroenterologist',
        'Hepatologist',
        'Oncologist',
        'Mental Health Specialist',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (self::$counter >= count(self::$specialties)) {
            throw new \RuntimeException('All specialties have been created');
        }

        return [
            'name' => self::$specialties[self::$counter++],
        ];
    }
}
