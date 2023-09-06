<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lab;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'lab_id'=>Lab::factory()->create(),
            'price'=>$this->faker->numerify('###'),
            'description'=>$this->faker->paragraph,
            'status'=>$this->faker->boolean,
        ];
    }
}
