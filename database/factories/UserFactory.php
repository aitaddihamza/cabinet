<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specialites = ['des yeux', 'de coeur', 'de foie', 'd\'os'];
        return [
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'cin' => fake()->randomLetter . random_int(1020, 99999),
            'role' => 'doctor',
            'specialite' => 'Medecin ' . $specialites[random_int(0, 3)],
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
