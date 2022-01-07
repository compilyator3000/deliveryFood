<?php
/**
 * Description of CityRepository.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Dish\DishServices\Repositories;


use App\Models\Dish;
use File;
use Illuminate\Support\Facades\Storage;


class EloquentDishRepository
{
    public function getDishes()
    {
        return Dish::all();
    }


    public function find(int $id)
    {

        return Dish::findOrFail($id);

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
        if (Dish::find($id)->delete()) {
            return true;
        }


    }
}
