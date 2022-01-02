<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//Route::get("/cafe",[CafeController::class,"index"]);
//Route::get("/cafe/{id}",[CafeController::class,"show"]);
//Route::post("/cafe/{id}",[CafeController::class,"show"]);


//
Route:: resource("/cafe",CafeController::class)->only([
    'index', 'show', 'store', ]);

Route:: resource("/category",CategoryController::class)->only(
    "index",'show');//middleware("auth")->

Route::middleware("auth")->group(function (){


    Route:: resource("/cafe",CafeController::class)->only([
        'update', 'destroy',  ]);
    Route::resource("/food",\App\Http\Controllers\FoodController::class)->only("update","store",
        "destroy");
    Route:: resource("/category",CategoryController::class)->only(
        "store",'update',"destroy");
    Route::resource("/orders",OrderController::class)->except("store");

});
Route::post("/orders",[OrderController::class,"store"]);


Route::resource("/food",\App\Http\Controllers\FoodController::class)->only("index",
"show");
Route::resource("/food",\App\Http\Controllers\FoodController::class)->only("update",
    "destroy");




Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [\App\Http\Controllers\AuthController::class,"login"]);
   // Route::post('registration', 'AuthController@registration');
    //Route::post('logout', 'AuthController@logout');
    //Route::post('refresh', 'AuthController@refresh');
   //1 Route::post('me', 'AuthController@me');
});

