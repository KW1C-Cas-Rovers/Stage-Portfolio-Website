<?php

namespace Modules\Users\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Users\app\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'preposition' => $this->faker->optional()->word,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // You might want to use Hash::make() in Laravel 7 and later
            'avatar' => $this->faker->imageUrl(),
            'bio' => $this->faker->paragraph,
            'website' => $this->faker->url,
            'is_active' => $this->faker->boolean,
            'remember_token' => Str::random(10),
        ];
    }
}

