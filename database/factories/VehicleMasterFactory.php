<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleMasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => rand(10000,20000),
            'name' => $this->faker->name,
            'slug' => $this->faker->name,
        ];
    }
}
