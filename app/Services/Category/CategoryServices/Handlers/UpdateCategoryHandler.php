<?php


namespace App\Services\Category\CategoryServices\Handlers;


use App\Models\Category;
use App\Models\Company;
use App\Services\Category\CategoryServices\Repositories\EloquentCategoryRepository;

class UpdateCategoryHandler
{

    private $CategoryRepository;

    public function __construct(
        EloquentCategoryRepository $CategoryRepository
    )
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    /**
     * @param array $data
     */
    public function handle($idCompany, $idCategory, array $data)//: Category
    {
        $category = Category::findOrFail($idCategory);

        if (Company::validCategory($category, $idCompany)) {

            return $this->CategoryRepository->updateFromArray(Category::findOrFail($idCategory), $data);
        }
        return false;


    }

}
