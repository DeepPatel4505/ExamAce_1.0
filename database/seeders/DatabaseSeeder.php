<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Exam;
use App\Models\Result;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        $users = User::factory()->count(10)->create();

        // Create jobs
        $jobs = Job::factory()->count(100)->create();

        // Create exams
        $exams = Exam::factory()->count(10)->create();

        // Create tags
        $tags = Tag::factory()->count(20)->create();

 

        // Associate tags with users
        $users->each(function ($user) use ($tags) {
            // Attach random tags to each user
            $user->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        $jobs->each(function ($job) use ($tags) {
            // Attach random tags to each job
            $job->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Associate tags with exams
        $exams->each(function ($exam) use ($tags) {
            // Attach random tags to each exam
            $exam->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Create results without linking to exams
     Result::factory()->count(30)->create()->each(function ($result) use ($tags) {
            // Attach random tags to each result
            $result->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
