<?php


namespace App\Services\Dish\DishServices\Handlers;


use App\Models\Category;
use App\Services\Dish\DishServices\Repositories\EloquentDishRepository;

class CreateDishHandler
{

    private $dishRepository;

    public function __construct(
        EloquentDishRepository $dishRepository
    )
    {
        $this->dishRepository = $dishRepository;
    }

    public function handle($idCompany, array $data)//: Dish
    {
        $category = Category::where("company_id", "=", $idCompany)->get();
        $category = $category->where("title", "=", $data["category"])->get(0);
        if (empty($category)) {
            return false;
        }
        $data["category_id"] = "$category->id";
        $data["company_id"] = "$category->company_id";

        return $this->dishRepository->createFromArray($data);
    }

}
