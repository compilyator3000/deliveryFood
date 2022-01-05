<?php


namespace App\Services\Dish\DishServices\Handlers;


use App\Models\Category;
use App\Models\Dish;
use App\Models\Company;
use App\Services\Dish\DishServices\Repositories\EloquentDishRepository;

class UpdateDishHandler
{

    private $DishRepository;

    public function __construct(
        EloquentDishRepository $DishRepository
    )
    {
        $this->DishRepository = $DishRepository;
    }

    /**
     * @param array $data
     */
    public function handle($idCompany, $idDish, array $data)//: Dish
    {
        $food = Dish::find($idDish);
        if (Category::findOrFail($food->category_id)->company_id != $idCompany) {
            return false;
        }
        return $this->DishRepository->updateFromArray($food, $data);


    }

}
