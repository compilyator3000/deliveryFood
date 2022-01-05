<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "token_order" => rand(100000, 100000000),
            "executed" => 0,
            "customer" => $this->faker->name,
            "phone" => $this->faker->phoneNumber,
            "deadline" => $this->faker->time("Y:m:d H:i:s"),
            "delivery_type" => rand(0, 1),
            "result_sum" => rand(100, 1000),
            "company_id" => rand(1, 6)
        ];
    }
}
