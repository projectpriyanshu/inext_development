<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class MisellaneousMasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'code' => rand(10000, 20000),
            'name' => $this->faker->name(),
            'gst' => rand(20000, 30000),
            'fuel_charges' => $this->faker->name(),
            'slug' => $this->faker->name(),
        ];
    }
}
