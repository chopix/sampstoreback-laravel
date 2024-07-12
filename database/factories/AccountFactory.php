<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'name' => fake()->firstNameMale() . '_' . fake()->lastName(),
            'password' => Hash::make('password'),
            'user_id' => User::factory()->create(),
            'server' => fake()->randomElement(['Arizona', 'Advance', 'Diamond']),
            'cost' => fake()->numberBetween(5, 10000),
            'isAccepted' => false,
        ];
    }
}
