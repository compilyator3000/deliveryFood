<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DishControllerTest extends TestCase
{

    public function testGetDishes()
    {
        $response = $this->get('/api/dishes');

        $response->assertStatus(200);
    }

    public function testGetDish()
    {
        $response = $this->get('/api/dishes/1');

        $response->assertStatus(200);
    }
//    public function testCreateDish()
//    {
//        $response = $this->post('/api/dishes', [
//            "category"=>"voluptatem",
//            "title"=>"pizza",
//            "weight"=>"100",
//            "price"=>"100",
//            "discount"=>"0",
//            "active"=>"1",
//            "description"=>"lorem ipsum"
//        ]);
//
//        $response->assertStatus(201);
//    }

}
