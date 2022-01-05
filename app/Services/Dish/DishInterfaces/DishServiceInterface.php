<?php

namespace App\Services\Dish\DishInterfaces;

interface DishServiceInterface
{
    public function getDishes();

    public function createDish(int $idCompany, array $data = []);

    public function updateDish(int $idCompany, int $idDish, array $data);

    public function findDish(int $id);

    public function destroyDish(int $idCompany, int $idDish);


}
