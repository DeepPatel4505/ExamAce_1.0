<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' Exam',
            'description' => $this->faker->sentence(10),
            'exam_date' => $this->faker->dateTimeBetween('+1 month', '+3 months'), // Random future date
            'qualification' => $this->faker->randomElement(['10th', '12th', 'Graduate', 'Post-Graduate']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
