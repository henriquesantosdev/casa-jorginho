<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::all()->random()->id,
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'cpf' => fake()->randomNumber(6, true) . fake()->randomNumber(5, true),
            'atended' => fake()->boolean()
        ];
    }
}
