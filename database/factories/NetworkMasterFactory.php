<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NetworkMasterFactory extends Factory
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
            'map_code' => rand(20000,30000),
            'slug' => $this->faker->name,
        ];
        
    }
}
