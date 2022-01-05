<?php


namespace App\Services\Control\Admin\AdminCategoryServices;




use App\Services\Control\Admin\AdminCategoryServices;


use App\Services\Control\Admin\AdminCategoryServices\CategoryInterfaces\AdminCategoryServiceInterface;
use App\Services\Control\Admin\AdminCategoryServices\CategoryServices\Repositories\EloquentCategoryRepository;

class AdminCategoryService implements AdminCategoryServiceInterface
{

    private $categoryRepository;


    public function __construct(
        EloquentCategoryRepository $repository


    )
    {
        $this->categoryRepository = $repository;

    }


    public function createCategory( array $data = [])
    {
        return $this->categoryRepository->createFromArray( $data);
    }

    public function updateCategory( int $idCategory, array $data)
    {
        return $this->categoryRepository->updateFromArray( $idCategory, $data);
    }

    public function findCategory(int $id)
    {
        return $this->categoryRepository->find($id);
    }

    public function destroyCategory( int $idCategory): bool
    {
        return $this->categoryRepository->destroy( $idCategory);
    }

    public function getCategories()
    {
        return $this->categoryRepository->getCategories();

    }
}
