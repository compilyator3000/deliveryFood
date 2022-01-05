<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;


use App\Services\Control\Admin\AdminCategoryServices\CategoryInterfaces\AdminCategoryServiceInterface;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    private $categoryService;

    public function __construct(

        AdminCategoryServiceInterface $categoryService
    )
    {

        $this->categoryService = $categoryService;

    }

    public function index()
    {
        return $this->categoryService->getCategories();

    }


    public function store(CategoryStoreRequest $request)
    {
        return $this->categoryService->createCategory( $request->toArray());
    }


    public function show($id)
    {
        return $this->categoryService->findCategory($id);
    }

    public function update(CategoryStoreRequest $request, $id)
    {
        $updated = $this->categoryService->updateCategory( $id, $request->toArray());

        return response()->json($updated, 200);
    }


    public function destroy(Request $request, $id)
    {
        $deleted = $this->categoryService->destroyCategory($id);
        return response()->json($deleted, 200);

    }
}
