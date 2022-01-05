<?php


namespace App\Services\Dish\DishServices;

use App\Services\Dish\DishInterfaces\DishServiceInterface;
use App\Services\Dish\DishServices\Handlers\CreateDishHandler;
use App\Services\Dish\DishServices\Handlers\DestroyDishHandler;
use App\Services\Dish\DishServices\Handlers\UpdateDishHandler;
use App\Services\Dish\DishServices\Repositories\EloquentDishRepository;

class DishService implements DishServiceInterface
{
    private $updateDishHandler;
    private $dishRepository;
    private $dishHandler;
    private $dishDestroyHandler;

    public function __construct(
        EloquentDishRepository $repository,
        UpdateDishHandler      $updateDishHandler,
        CreateDishHandler      $dishHandler,
        DestroyDishHandler     $dishDestroyHandler

    )
    {
        $this->dishRepository = $repository;
        $this->updateDishHandler = $updateDishHandler;
        $this->dishHandler = $dishHandler;
        $this->dishDestroyHandler = $dishDestroyHandler;
    }


    public function createDish(int $idCompany, array $data = [])
    {
        return $this->dishHandler->handle($idCompany, $data);
    }

    public function updateDish(int $idCompany, int $idDish, array $data)
    {
        return $this->updateDishHandler->handle($idCompany, $idDish, $data);
    }

    public function findDish(int $id)
    {
        return $this->dishRepository->find($id);
    }

    public function destroyDish(int $idCompany, int $idDish, $data = []): bool
    {
        return $this->dishDestroyHandler->handle($idCompany, $idDish, $data);
    }


    public function getDishes()
    {
        return $this->dishRepository->getDishes();
    }
}
