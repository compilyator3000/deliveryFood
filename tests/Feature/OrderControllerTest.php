<?php

namespace Tests\Feature;

use App\Events\OrderEvent;
use Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{


    public function testCreateOrder()
    {
        Event::fake();
        $response = $this->json("post", '/api/orders', [
            "customer" => "kolya",
            "phone" => "050144141",
            "deadline" => "1640686406",
            "delivery_type" => "1",
            "data" => [
                [
                    "dish_id" => "1",
                    "count" => "1"
                ]
                ,
                [
                    "dish_id" => 2,
                    "count" => "1"
                ]
                ,
                [
                    "dish_id" => 3,
                    "count" => "1"
                ]

            ]
        ]);
        Event::assertDispatched(OrderEvent::class);

        $response->assertStatus(201);
    }

}
