<?php

namespace Tests\Feature;

use App\Events\OrderEvent;
use App\Models\Company;
use App\Models\Order;
use Event;
use Tests\Generators\Dish\DishesGenerator;
use Tests\JwtHelper\HElp;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    private $idCompany;

    public function testCreateOrder()
    {
        $this->idCompany = Company::where("email", "=", "testcompany@gmail")->get()[0]["id"];
        DishesGenerator::createDishes(3, $this->idCompany);
        //простой тестовый json
        Event::fake();//тушим ивент с отправкой сообщения на телеграм
        $response = $this->json("post", '/api/orders', [
            "customer" => "kolya",
            "phone" => "050144141",
            "deadline" => "1640686406",
            "delivery_type" => "1",
            "data" => [
                [
                    "dish_id" => 31,
                    "count" => "1"
                ]
                ,
                [
                    "dish_id" => 32,
                    "count" => "1"
                ]
                ,
                [
                    "dish_id" => 33,
                    "count" => "1"
                ]

            ]
        ]);
        Event::dispatch(OrderEvent::class);

        $response->assertStatus(201);
    }

    public function testGetOrders()
    {
        $response = $this->withToken(HElp::$jwt)->withHeader("Accept", "application/json")->get('/api/orders');
        $response->assertStatus(200);
    }

    public function testGetOrder()
    {
        $token = (Order::query()->find(1))->token_order;
        $response = $this->withToken(HElp::$jwt)->withHeader("Accept", "application/json")->get("/api/orders/$token");
        $response->assertStatus(200);
    }

    public function testGetDishWhichNotExist()
    {
        $response = $this->withToken(HElp::$jwt)->withHeader("Accept", "application/json")->get('/api/orders/123123');
        $response->assertStatus(404);
    }


    public function testUpdateOrder()
    {
        $token = Order::query()->find(1)["token_order"];

        $response = $this->withToken(HElp::$jwt)->withHeader(
            "Accept", "application/json")
            ->patch("/api/orders/$token");
        $response->assertOk();
    }

    public function testUpdateDishWithoutPermission()
    {
        $token = Order::query()->find(1)["token_order"];

        $response = $this->withHeader(
            "Accept", "application/json")
            ->patch("/api/orders/$token");
        $response->assertStatus(401);
    }

    public function testDeleteOrderWithoutPermission()
    {
        $token = Order::query()->find(1)["token_order"];
        $response = $this->withHeader(
            "Accept", "application/json")
            ->delete("/api/orders/$token");
        $response->assertStatus(401);
    }

    public function testDeleteOder()
    {
        $token = Order::query()->find(1)["token_order"];
        $response = $this->withToken(HElp::$jwt)->withHeader(
            "Accept", "application/json")
            ->delete("/api/orders/$token");
        $response->assertStatus(200);
    }
}
