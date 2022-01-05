<?php
/**
 * Description of CityRepository.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Category\CategoryServices\Repositories;


use App\Http\Resources\Category\CategoryResourse;
use App\Models\Category;

class EloquentCategoryRepository
{
    public function getCategories()
    {
        return CategoryResourse::collection(Category::with("dish")->get());
    }


    public function find(int $id)
    {
        return   CategoryResourse::make(Category::findOrFail($id));
    }


    public function createFromArray(array $data): CategoryResourse
    {
        return CategoryResourse::make($create_Company = Category::create($data));

//        $data['password']=password_hash($data['password'],PASSWORD_BCRYPT);
//        $create_Company = Company::create($data);
//        return CompanyResource::make($create_Company);
    }

    public function updateFromArray(Category $company, array $data)
    {
        $company->update($data);
        return $company;
    }

    public function destroy(int $id){
       if(Category::find($id)->delete()){  return true;}



    }
}
