<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'organization' => $this->faker->company(),
            'job_type' => $this->faker->randomElement(['Government', 'Private']),
            'location' => $this->faker->city(),
            'eligibility' => $this->faker->randomElement(['10th', '12th', 'Graduate', 'Post-Graduate']),
            'vacancies' => $this->faker->numberBetween(1, 100),
            'application_start_date' => $this->faker->date(),
            'application_end_date' => $this->faker->date(),
            'job_status' => $this->faker->randomElement(['Open', 'Closed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
