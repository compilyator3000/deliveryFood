<?php

use App\Http\Controllers\AdminControllers\AdminCategoryController;
use App\Http\Controllers\AdminControllers\AdminCompanyController;
use App\Http\Controllers\AdminControllers\AdminDishController;
use App\Http\Controllers\AdminControllers\AdminOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




    Route::prefix("control")->middleware("auth_admin")->group(function(){
        Route::resource("/companies",AdminCompanyController::class);
        Route::resource("/categories",AdminCategoryController::class);
        Route::resource("/dishes",AdminDishController::class);
        Route::resource("/orders",AdminOrderController::class);

    });


Route:: resource("/companies", CompanyController::class)->only([
    'index', 'show', 'store',]);

Route:: resource("/categories", CategoryController::class)->only(
    "index", 'show');

Route::middleware("auth")->group(function () {


    Route:: resource("/companies", CompanyController::class)->only([
        'update', 'destroy',]);
    Route::resource("/dishes", DishController::class)->only("update", "store",
        "destroy");
    Route:: resource("/categories", CategoryController::class)->only(
        "store", 'update', "destroy");
    Route::resource("/orders", OrderController::class)->except("store");

});
Route::post("/orders", [OrderController::class, "store"]);


Route::resource("/dishes", DishController::class)->only("index",
    "show");
Route::resource("/dishes", DishController::class)->only("update",
    "destroy");


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, "login"]);

});

