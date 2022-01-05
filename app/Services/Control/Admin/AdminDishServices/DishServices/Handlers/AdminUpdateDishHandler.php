<?php


namespace App\Services\Control\Admin\AdminDishServices\DishServices\Handlers;


use App\Models\Category;
use App\Models\Dish;
use App\Models\Company;
use App\Services\Dish\DishServices\Repositories\EloquentDishRepository;

class AdminUpdateDishHandler
{

    private $DishRepository;

    public function __construct(
        EloquentDishRepository $DishRepository
    )
    {
        $this->DishRepository = $DishRepository;
    }


    public function handle($idDish, array $data)
    {
        $food = Dish::find($idDish);
        return $this->DishRepository->updateFromArray($food, $data);


    }

}
