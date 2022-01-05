<?php
/**
 * Description of CityRepository.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Control\Admin\AdminCategoryServices\CategoryServices\Repositories;


use App\Http\Resources\Category\CategoryResourse;
use App\Models\Category;

class EloquentCategoryRepository
{
    public function getCategories()
    {
        return Category::all();
        // return Category::with("dish")->get();
    }


    public function find(int $id)
    {
        return Category::findOrFail($id);
    }


    public function createFromArray(array $data)
    {
        return Category::create($data);


    }

    public function updateFromArray(int $idCategory, array $data)
    {
        $category = Category::findOrFail($idCategory);

        $category->update($data);
        return $category;
    }

    public function destroy(int $id)
    {
        if (Category::find($id)->delete()) {
            return true;
        }


    }
}
