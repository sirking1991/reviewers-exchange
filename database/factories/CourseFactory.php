<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentences(asText:true),
            'language' => $this->faker->languageCode(),
            'currency' => $this->faker->currencyCode(),
            'price' => $this->faker->numberBetween(),
            'subject' => $this->faker->randomElement(['Physics', 'Calculus', 'Biology', 'UPCAT', 'SAT', 'CIVIL-SERVICE']),
        ];
    }
}
