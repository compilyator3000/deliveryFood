<?php
/**
 * Description of CityRepository.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Control\Admin\AdminDishServices\DishServices\Repositories;
use App\Models\Dish;

class EloquentDishRepository
{
    public function getDishes()
    {
        return Dish::all();
    }


    public function find(int $id)
    {
        return Dish::query()->findOrFail($id);
    }


    public function createFromArray(array $data)
    {
        return Dish::query()->create($data);
    }

    public function updateFromArray(Dish $dish, array $data)
    {
        $dish->update($data);
        return $dish;
    }

    public function destroy(int $id)
    {
        if (Dish::query()->findOrFail($id)->delete()) {
            return true;
        }


    }
}
