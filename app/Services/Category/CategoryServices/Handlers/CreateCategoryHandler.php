<?php


namespace App\Services\Category\CategoryServices\Handlers;


use App\Services\Category\CategoryServices\Repositories\EloquentCategoryRepository;

class CreateCategoryHandler
{

    private $categoryRepository;

    public function __construct(
        EloquentCategoryRepository $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function handle($idCompany, array $data)//: Category
    {
        $data["company_id"] = $idCompany;
        return $this->categoryRepository->createFromArray($data);
    }

}
