<?php


namespace App\Services\Category\CategoryServices;

use App\Services\Category\CategoryInterfaces\CategoryServiceInterface;
use App\Services\Category\CategoryServices\Handlers\CreateCategoryHandler;
use App\Services\Category\CategoryServices\Handlers\DestroyCategoryHandler;
use App\Services\Category\CategoryServices\Handlers\UpdateCategoryHandler;
use App\Services\Category\CategoryServices\Repositories\EloquentCategoryRepository;

class CategoryService implements CategoryServiceInterface
{
    private $updateCategoryHandler;
    private $categoryRepository;
    private $categoryHandler;
    private $categoryDestroyHandler;

    public function __construct(
        EloquentCategoryRepository $repository,
        UpdateCategoryHandler     $updateCategoryHandler,
        CreateCategoryHandler      $categoryHandler,
        DestroyCategoryHandler     $categoryDestroyHandler

    )
    {
        $this->categoryRepository = $repository;
        $this->updateCategoryHandler = $updateCategoryHandler;
        $this->categoryHandler = $categoryHandler;
        $this->categoryDestroyHandler = $categoryDestroyHandler;
    }


    public function createCategory(int $idCompany, array $data = [])
    {
        return $this->categoryHandler->handle($idCompany, $data);
    }

    public function updateCategory(int $idCompany, int $idCategory, array $data)
    {

        return $this->updateCategoryHandler->handle($idCompany, $idCategory, $data);
    }

    public function findCategory(int $id)
    {
        return $this->categoryRepository->find($id);
    }

    public function destroyCategory(int $idCompany, int $idCategory, $data = []): bool
    {
        return $this->categoryDestroyHandler->handle($idCompany, $idCategory, $data);
    }

    public function getCategories()
    {
        return $this->categoryRepository->getCategories();

    }
}
