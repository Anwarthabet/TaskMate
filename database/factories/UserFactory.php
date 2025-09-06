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
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'), // password
            'username' => $this->faker->unique()->userName(),
            
            'sign_up_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'last_login' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'account_status' => $this->faker->randomElement(['active', 'inactive', 'suspended']),
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people'),
            'role' => $this->faker->randomElement(['user', 'admin']),
         
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
        ]);
    }
}
