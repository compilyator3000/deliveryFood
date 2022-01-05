<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dish\DishStoreRequest;
use App\Services\Control\Admin\AdminDishServices\DishInterfaces\AdminDishInterface;
use Illuminate\Http\Request;

class AdminDishController extends Controller
{
    private $dishService;

    public function __construct(
        AdminDishInterface $dishService
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


    public function store(Request $request)
    {
        return $this->dishService->createDish($request->toArray());
    }

    public function update(Request $request, $idDish)
    {
        return   $this->dishService->updateDish( $idDish, $request->toArray());

    }

    public function destroy(Request $request, $idDish)
    {
        return  $this->dishService->destroyDish($idDish);
    }
}
