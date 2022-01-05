<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dish\DishStoreRequest;
use App\Services\Dish\DishInterfaces\DishServiceInterface;
use Illuminate\Http\Request;

class DishController extends Controller
{
    private $dishService;

    public function __construct(
        DishServiceInterface $dishService
    )
    {
        $this->dishService = $dishService;
    }

    public function index()
    {
        return $this->dishService->getDishes();
    }

    public function show($id)
    {
        return $this->dishService->findDish($id);
    }


    public function store(DishStoreRequest $request)
    {
        return $this->dishService->createDish($request->user()->id, $request->toArray());
    }

    public function update(Request $request, $idDish)
    {
        $updated = $this->dishService->updateDish($request->user()->id, $idDish, $request->toArray());
        if ($updated == false) {
            return response()->json("Have not permission");
        }
        return $updated;
    }

    public function destroy(Request $request, $idDish)
    {
        $deleted = $this->dishService->destroyDish($request->user()->id, $idDish);
        if ($deleted == false) {
            return response()->json("Have not permission or not have content");
        }
        return response()->json("ok");

    }
}
