<?php

namespace Tests\Generators\Dish;

use App\Models\Category;
use App\Models\Dish;

class DishesGenerator
{

    public static function createDishes(int $countOfDishes, int $idCompany)
    {
        $idCategory=Category::where("company_id", "=", $idCompany)->get()[0]["id"];;
        $dishes = Dish::factory()->count($countOfDishes)->make();
        $dishes = $dishes->toArray();
        $newDishes=null;
        foreach ($dishes as $idDish) {
            $idDish["company_id"] = $idCompany;
            $idDish["category_id"] = $idCategory;
            $newDishes[]=$idDish;
        }


        foreach ($newDishes as $dish) {
            Dish::query()->create($dish);
        }

        return $newDishes;

    }

    public static function createDishUseFactory(int $count){
        return Dish::factory()->count($count)->create();

    }

}
