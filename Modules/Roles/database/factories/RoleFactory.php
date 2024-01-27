<?php

namespace Modules\Roles\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Roles\app\Models\Role;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
        ];
    }
}

