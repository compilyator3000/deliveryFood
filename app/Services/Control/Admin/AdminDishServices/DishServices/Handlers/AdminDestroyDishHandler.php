<?php

namespace App\Services\Control\Admin\AdminDishServices\DishServices\Handlers;

use App\Models\Dish;
use App\Services\Dish\DishServices\Repositories\EloquentDishRepository;

class AdminDestroyDishHandler
{

    private $dishRepository;

    public function __construct(
        EloquentDishRepository $dishRepository
    )
    {
        $this->dishRepository = $dishRepository;
    }

    public function handle($idDish, array $data)//: Dish
    {
        $dish = Dish::query()->findOrFail($idDish);
        if ($dish == null) {
            return false;
        }
        return $this->dishRepository->destroy($idDish);


    }

}
