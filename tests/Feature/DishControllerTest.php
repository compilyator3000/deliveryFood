<?php

namespace Tests\Feature;

use App\Validators\HElp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DishControllerTest extends TestCase
{

    public function testGetDishes()
    {
        dd(HElp::$jwt);
        $response = $this->get('/api/dishes');

        $response->assertStatus(200);
    }
//
//    public function testGetDish()
//    {
//        $response = $this->get('/api/dishes/1');
//
//        $response->assertStatus(200);
//    }


}
