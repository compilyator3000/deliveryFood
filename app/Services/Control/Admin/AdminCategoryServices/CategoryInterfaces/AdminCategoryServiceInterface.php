<?php

namespace App\Services\Control\Admin\AdminCategoryServices\CategoryInterfaces;

interface AdminCategoryServiceInterface
{
    public function getCategories();

    public function createCategory( array $data = []);

    public function updateCategory(int $idCategory, array $data);

    public function findCategory(int $id);

    public function destroyCategory( int $idCategory);


}
