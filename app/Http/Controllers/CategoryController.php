<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Services\Category\CategoryInterfaces\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(
        CategoryServiceInterface $categoryService
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
        $idCompany = $request->user()->id;
        return $this->categoryService->createCategory($idCompany, $request->toArray());
    }


    public function show($id)
    {
        return $this->categoryService->findCategory($id);
    }

    public function update(CategoryStoreRequest $request, $id)
    {
        $updated = $this->categoryService->updateCategory($request->user()->id, $id, $request->toArray());
        if ($updated == false) {
            return response()->json("Have not permission", 204);
        }
        return response()->json($updated, 200);
    }


    public function destroy(Request $request, $id)
    {
        $deleted = $this->categoryService->destroyCategory($request->user()->id, $id, $request->toArray());
        if ($deleted == false) {
            return response()->json("Have not permission", 401);
        }
        return response()->json($deleted, 204);

    }
}
