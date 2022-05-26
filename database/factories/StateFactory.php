<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
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
            'gst_state_code' => rand(20000,30000),
            'slug' => $this->faker->name,
        ];
    }
}
