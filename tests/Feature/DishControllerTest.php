<?php

namespace Tests\Feature;

use App\Events\StoreImageCompanyEvent;
use App\Models\Category;
use App\Models\Dish;
use Event;
use Tests\Generators\Dish\DishesGenerator;
use Tests\JwtHelper\HElp;
use Tests\TestCase;

class DishControllerTest extends TestCase
{


    public function testGetDishes()
    {
        DishesGenerator::createDishUseFactory(30);
        $response = $this->get('/api/dishes');
        $response->assertStatus(200);
    }

    public function testGetDish()
    {
        $response = $this->get('/api/dishes/1');
        $response->assertStatus(200);
    }

    public function testGetDishWhichNotExist()
    {
        $response = $this->get('/api/dishes/1000000');
        $response->assertStatus(404);
    }


    public function testCreateDish()
    {
Event::fake();

        $response = $this->withToken(HElp::$jwt)
            ->withHeader(
                "Accept", "application/json")
            ->post('/api/dishes', [
                "category" => Category::find(11)->title,
                "title" => "chocolate cake",
                "weight" => "400",
                "price" => "60",
                "discount" => "0",
                "description" => "very tasty cake",
                "active" => "1",

            ]);
        Event::dispatch(StoreImageCompanyEvent::class);
        $response->assertStatus(201);
    }

    public function testUpdateDish()
    {
        $response = $this->withToken(HElp::$jwt)->withHeader(
            "Accept", "application/json")
            ->patch("/api/dishes/11", [
                "title" => "cheese cake"
            ]);
        $response->assertOk();
    }

    public function testUpdateDishWithoutPermission()
    {
        $response = $this->withHeader(
            "Accept", "application/json")
            ->patch("/api/dishes/11", [
                "title" => "testCheeseCake"
            ]);
        $response->assertStatus(401);
    }

    public function testDeleteDishWithoutPermission()
    {
        $response = $this->withHeader(
            "Accept", "application/json")
            ->delete("/api/dishes/11");
        $response->assertStatus(401);
    }

//    public function testDeleteCategory()
//    {
//        // $company = (Company::all()->toArray())[0]["id"];
//
//        $response = $this->withToken(HElp::$jwt)->withHeader(
//            "Accept", "application/json")
//            ->delete("/api/dishes/11");
//        $response->assertStatus(204);
//    }


}
