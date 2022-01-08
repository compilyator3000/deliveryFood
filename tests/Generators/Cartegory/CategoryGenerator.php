<?php

namespace Tests\Generators\Cartegory;

use App\Models\Category;

class CategoryGenerator
{

    public static function createCategory(array $data){
        return Category::create($data);

    }
    public static function createCategoryUseFactory(int $count){
        return Category::factory()->count($count)->create();

    }

}
