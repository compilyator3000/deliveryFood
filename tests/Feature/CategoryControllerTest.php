<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{

    public function testGetCategories()
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }

    public function testGetCategory()
    {
        $response = $this->get('/api/categories/1');

        $response->assertStatus(200);
    }

}
