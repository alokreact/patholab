<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
class LabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lab_name'=>$this->faker->name,
            'address1'=>$this->faker->address,
            'state'=>$this->faker->name,
            'city'=>$this->faker->name,
            'pin'=>$this->faker->numerify('######'),
            'phone'=>$this->faker->numerify('##########'),
            'image'=>UploadedFile::fake()->image('photo2.jpg'),
            'status'=>$this->faker->boolean
        ];
    }
}
