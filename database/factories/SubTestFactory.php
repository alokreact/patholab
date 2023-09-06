<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){

        return [
            'name'=>$this->faker->name,
            'price'=>$this->faker->numerify('##'),
            'reporting_time'=>$this->faker->numerify('##'),
            'volume'=>$this->faker->numerify('#'),
        ];
    }
}
