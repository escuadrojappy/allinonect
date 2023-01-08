<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    Establishment,
    Visitor,
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScannedVisitor>
 */
class ScannedVisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'visitor_id' => Visitor::all()->random()->id,
            // 'establishment_id' => Establishment::all()->random()->id,
            // 'entrance_timestamp' => fake()->date(). ' '. fake()->time(),
            'visitor_id' => Visitor::all()->random()->id,
            'establishment_id' => 247,
            'entrance_timestamp' => '2022-12-26 14:41:00',
        ];
    }
}
