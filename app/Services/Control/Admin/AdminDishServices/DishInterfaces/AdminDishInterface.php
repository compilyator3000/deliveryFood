<?php

namespace App\Services\Control\Admin\AdminDishServices\DishInterfaces;

interface AdminDishInterface
{
    public function getDishes();

    public function createDish( array $data = []);

    public function updateDish( int $idDish, array $data);

    public function findDish(int $id);

    public function destroyDish( int $idDish);


}
