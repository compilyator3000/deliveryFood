<?php

namespace App\Services\Control\Admin\AdminDishServices;

use App\Services\Control\Admin\AdminDishServices\DishInterfaces\AdminDishInterface;
use App\Services\Control\Admin\AdminDishServices\DishServices\Handlers\AdminDestroyDishHandler;
use App\Services\Control\Admin\AdminDishServices\DishServices\Handlers\AdminUpdateDishHandler;
use App\Services\Control\Admin\AdminDishServices\DishServices\Repositories\EloquentDishRepository;
use App\Services\Dish\DishInterfaces\DishServiceInterface;

//use App\Services\Dish\DishServices\Handlers\CreateDishHandler;
//use App\Services\Dish\DishServices\Handlers\DestroyDishHandler;
//use App\Services\Dish\DishServices\Handlers\UpdateDishHandler;
//use App\Services\Dish\DishServices\Repositories\EloquentDishRepository;

class AdminDishService implements AdminDishInterface
{
    private $updateDishHandler;
    private $dishRepository;
    private $dishDestroyHandler;

    public function __construct(
        EloquentDishRepository  $repository,
        AdminUpdateDishHandler  $updateDishHandler,
        AdminDestroyDishHandler $dishDestroyHandler

    )
    {
        $this->dishRepository = $repository;
        $this->updateDishHandler = $updateDishHandler;
        $this->dishDestroyHandler = $dishDestroyHandler;
    }


    public function createDish(array $data = [])
    {
        return $this->dishRepository->createFromArray($data);
    }

    public function updateDish(int $idDish, array $data)
    {
        return $this->updateDishHandler->handle($idDish, $data);
    }

    public function findDish(int $id)
    {
        return $this->dishRepository->find($id);
    }

    public function destroyDish(int $idDish, $data = []): bool
    {
        return $this->dishDestroyHandler->handle($idDish, $data);
    }


    public function getDishes()
    {
        return $this->dishRepository->getDishes();
    }
}
