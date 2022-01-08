<?php

namespace App\Http\Controllers;

use App\Events\StoreImageCompanyEvent;
use App\Http\Requests\Dish\DishStoreRequest;
use App\Services\Dish\DishInterfaces\DishServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $dish = $this->dishService->createDish($request->user()->id, $request->toArray());
        if ($dish == false) {
            return response()->json("Not found category", 401);
        }
        if(!empty($request->file("image")))
        event(new StoreImageCompanyEvent($dish->id, $request->file("image")));
        return response()->json($dish, 201);
    }

    public function update(Request $request, $idDish)
    {
        if (empty($request->user()->id))
            return response()->json("Have not permission", 401);
        $updated = $this->dishService->updateDish($request->user()->id, $idDish, $request->toArray());
        if ($updated == false) {
            return response()->json("Have not permission");
        }
        return $updated;
    }

    public function destroy(Request $request, $idDish)
    {
        if (empty($request->user()->id))
            return response()->json("Have not permission", 401);
        $deleted = $this->dishService->destroyDish($request->user()->id, $idDish);
        if ($deleted == false) {
            return response()->json("Have not permission or not have content");
        }
        return response()->json("ok");

    }
}
