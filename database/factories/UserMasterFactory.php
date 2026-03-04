<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserMasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       => $this->faker->name(),
            'email'      => $this->faker->unique()->safeEmail(),
            'department' => $this->faker->randomElement(['開発部', '営業部', '総務部', null]),
            'role'       => $this->faker->randomElement(['user', 'admin']),
            'is_active'  => true,
        ];
    }
}
