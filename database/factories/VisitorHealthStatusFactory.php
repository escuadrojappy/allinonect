<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Visitor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisitorHealthStatus>
 */
class VisitorHealthStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'visitor_id' => Visitor::all()->random()->id,
            'covid_result' => fake()->numberBetween(0, 1),
            'date_result' => fake()->date(). ' '. fake()->time(),
            'remarks' => fake()->words(5, true),
        ];
    }
}
