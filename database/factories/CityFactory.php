<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
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
            'country_id' => 1,
            'state_id' => 1,
            'slug' => $this->faker->name(),
            'status' => '1',
        ];
    }
}
