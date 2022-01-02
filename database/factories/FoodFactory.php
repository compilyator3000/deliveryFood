<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'category_id'=>rand(1,10),
            'cafe_id'=>rand(1,5),
            'title'=>$this->faker->word,
            'price'=>rand(80,200),
            'weight'=>rand(300,1000),
            'discount'=>$this->faker->randomFloat(2,0,"1"),
            'description'=>$this->faker->text,

        ];
    }
}
