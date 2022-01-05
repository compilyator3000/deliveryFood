<?php

use App\Http\Controllers\CafeController;
use App\Models\Personnel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::middleware("auth_api")->get("/try",function (){
//
//   // dd("hello");
//});
Route::get("/",function (){
    return view("welcome");
});
Route::resource("/allcafe",CafeController::class);
//[\App\Http\Controllers\PersonnelController::class,"registration"]

