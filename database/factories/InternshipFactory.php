<?php

namespace Database\Factories;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Internship>
 */
class InternshipFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->jobTitle;
        return [
            'company_id' => \App\Models\Company::factory(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title . '-' . $this->faker->unique()->numberBetween(1000, 9999)),
            'description' => $this->faker->paragraphs(3, true),
            'requirements' => $this->faker->paragraphs(2, true),
            'responsibilities' => $this->faker->paragraphs(2, true),
            'location' => $this->faker->streetAddress,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'internship_type' => $this->faker->randomElement(['Remote', 'Onsite', 'Hybrid']),
            'duration' => $this->faker->randomElement(['1 month', '3 months', '6 months']),
            'salary' => $this->faker->boolean(60) ? '$' . $this->faker->numberBetween(500, 3000) . ' / month' : null,
            'is_paid' => function (array $attributes) {
                return $attributes['salary'] !== null;
            },
            'field' => 'Business', // Placeholder, will be overridden by seeder
            'subfield' => $this->faker->jobTitle,
            'experience_level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            'skills_required' => [$this->faker->word, $this->faker->word, $this->faker->word],
            'students_viewed' => $this->faker->numberBetween(50, 500),
            'application_count' => $this->faker->numberBetween(5, 200),
            'deadline' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'status' => 'Open',
            'featured' => $this->faker->boolean(10),
            'is_new' => $this->faker->boolean(20),
        ];
    }
}
