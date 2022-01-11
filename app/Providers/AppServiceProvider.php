<?php

namespace App\Providers;

use App\Http\Controllers\AdminControllers\AdminDishController;
use App\Services\Category\CategoryInterfaces\CategoryServiceInterface;
use App\Services\Category\CategoryServices\CategoryService;
use App\Services\Company\CompanyInterfaces\CompanyServiceInterface;
use App\Services\Control\Admin\AdminCategoryServices\AdminCategoryService;
use App\Services\Control\Admin\AdminCategoryServices\CategoryInterfaces\AdminCategoryServiceInterface;
use App\Services\Control\Admin\AdminCompanyServices\AdminCompanyService;
use App\Services\Control\Admin\AdminCompanyServices\CompanyInterfaces\AdminCompanyServiceInterface;
use App\Services\Company\CompanyServices\CompanyService;
use App\Services\Control\Admin\AdminDishServices\AdminDishService;
use App\Services\Control\Admin\AdminDishServices\DishInterfaces\AdminDishInterface;
use App\Services\Control\Admin\AdminOrderServices\AdminOrderService;
use App\Services\Control\Admin\AdminOrderServices\OrderInterfaces\AdminOrderServiceInterface;
use App\Services\Dish\DishInterfaces\DishServiceInterface;
use App\Services\Dish\DishServices\DishService;
use App\Services\Order\OrderInterfaces\OrderServiceInterface;
use App\Services\Order\OrderServices\OrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CompanyServiceInterface::class,CompanyService::class);
        $this->app->bind(CategoryServiceInterface::class,CategoryService::class);
        $this->app->bind(DishServiceInterface::class,DishService::class);
        $this->app->bind(OrderServiceInterface::class,OrderService::class);

        $this->app->bind(AdminCompanyServiceInterface::class,AdminCompanyService::class);
        $this->app->bind(AdminCategoryServiceInterface::class,AdminCategoryService::class);
        $this->app->bind(AdminDishInterface::class,AdminDishService::class);
        $this->app->bind(AdminOrderServiceInterface::class,AdminOrderService::class);

    }

    public function boot()
    {
        //
    }
}
