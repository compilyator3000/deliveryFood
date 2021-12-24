<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CafeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location'=>$this->faker->streetName,
            'name'=>$this->faker->company,
            'status_of_working'=>rand(0,1),
            'town'=>$this->faker->city,
            'description'=>$this->faker->text,
            'password'=>$this->faker->word,
        ];
    }
}
