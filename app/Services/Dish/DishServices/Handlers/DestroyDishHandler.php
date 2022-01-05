<?php

namespace App\Services\Dish\DishServices\Handlers;

use App\Models\Dish;
use App\Services\Dish\DishServices\Repositories\EloquentDishRepository;

class DestroyDishHandler
{

    private $dishRepository;

    public function __construct(
        EloquentDishRepository $dishRepository
    )
    {
        $this->dishRepository = $dishRepository;
    }

    public function handle($idCompany, $idDish, array $data)//: Dish
    {
        $dish = Dish::query()->findOrFail($idDish);
        if ($dish == null) {
            return false;
        }
        if ($dish->company_id == $idCompany) {
            return $this->dishRepository->destroy($idDish);
        }
        return false;


    }

}
