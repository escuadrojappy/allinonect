<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->state([
                'role_id' => 3,
                'email' => null
            ]),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
            'birthdate' => fake()->date(),
            'place_of_birth' => fake()->city(),
            'contact_number' => fake()->phoneNumber(),
            'philsys_card_number' => fake()->numerify('####-####-####-####'),
        ];
    }
}
