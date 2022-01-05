<?php

namespace App\Services\Category\CategoryInterfaces;

interface CategoryServiceInterface
{
    public function getCategories();

    public function createCategory(int $idCompany, array $data = []);

    public function updateCategory(int $idCompany, int $idCategory, array $data);

    public function findCategory(int $id);

    public function destroyCategory(int $idCompany, int $idCategory);


}
