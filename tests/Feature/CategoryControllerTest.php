<?php

namespace Tests\Feature;

use Tests\Generators\Cartegory\CategoryGenerator;
use Tests\Generators\Company\CompanyGenerator;
use Tests\JwtHelper\HElp;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{


    public function testGetCategories()
    {
    CompanyGenerator::createCompanyUseFactory(5);
       CategoryGenerator::createCategoryUseFactory(10);
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }

    public function testGetCategory()
    {
        $response = $this->get('/api/categories/1');
        $response->assertStatus(200);
    }

    public function testGetCategoryWhichNotExist()
    {
        $response = $this->get('/api/categories/1000000');
        $response->assertStatus(404);
    }


    public function testCreateCategory()
    {
        $data = [

            "title" => "pizza"
        ];

        $response = $this->withToken(HElp::$jwt)
            ->withHeader(
                "Accept", "application/json")
            ->post('/api/categories', $data);

        $response->assertStatus(201);
    }

    public function testUpdateCategory()
    {
        $response = $this->withToken(HElp::$jwt)->withHeader(
            "Accept", "application/json")
            ->patch("/api/categories/11", [
                "title" => "cheeseCake"
            ]);

        $response->assertOk();
    }

    public function testUpdateCategoryWithoutPermission()
    {
        $response = $this->withHeader(
            "Accept", "application/json")
            ->patch("/api/categories/11", [
                "title" => "cheeseCake"
            ]);
        $response->assertStatus(401);
    }

    public function testDeleteCategoryWithoutPermission()
    {
        $response = $this->withHeader(
            "Accept", "application/json")
            ->delete("/api/categories/11");
        $response->assertStatus(401);
    }

//    public function testDeleteCategory()
//    {
//        // $company = (Company::all()->toArray())[0]["id"];
//
//        $response = $this->withToken(HElp::$jwt)->withHeader(
//            "Accept", "application/json")
//            ->delete("/api/categories/11");
//        $response->assertStatus(204);
//    }

}
