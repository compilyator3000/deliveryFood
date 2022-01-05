<?php

namespace Database\Factories;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dish_id = rand(1, 40);
        return [
            "order_id" => rand(1, 10),
            "dish_id" => $dish_id,
            "count" => rand(1, 6),
            "price" => Dish::query()->findOrFail($dish_id)->price,

        ];
    }
}
