<?php

namespace Tests\Feature;


use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\JwtHelper\HElp;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{


    public function testCreateCompany()
    {

        $response = $this->post('/api/companies', [
            "email" => "testcompany@gmail",
            "password" => "123",
            "location" => "Pushkina 12",
            "town" => "Chernigov",
            "status_of_working" => "1",
            "description" => "test lorem ipsum"
        ]);


        $response->assertStatus(200);
    }

    public function testSignInCompany()
    {
        $response = $this->postjson('/api/auth/login', [
            "email" => "testcompany@gmail",
            "password" => "123",

        ]);
        HElp::$jwt = (string)$response->offsetGet("access_token");
        if (!empty(HElp::$jwt))
            $response->assertOk();


    }

    public function testGetCompanies()
    {
        $response = $this->get('/api/companies');
        $response->assertOk()->assertJsonStructure([
            "data" => [
                "*" => [
                    "id",
                    "location",
                    "status_of_working",
                    "town",
                    "description",
                    "created_at"
                ]
            ]
        ]);


    }

    public function testGetCompany()
    {
        $company = (Company::all()->toArray())[0]["id"];
        $response = $this->get("/api/companies/$company");

        $response->assertStatus(200);
    }

    public function testUpdateCompany()
    {
        $company = (Company::all()->toArray())[0]["id"];

        $response = $this->withToken(HElp::$jwt)->withHeader(
            "Accept", "application/json")
            ->patch("/api/companies/$company", [
                "description" => "update data after testing"
            ]);
        $response->assertOk();
    }
    public function testUpdateCompanyWithoutPermission()
    {
        $company = (Company::all()->toArray())[0]["id"];

        $response = $this->withHeader(
            "Accept", "application/json")
            ->patch("/api/companies/$company", [
                "description" => "update data after testing"
            ]);
        $response->assertStatus(401);
    }
    public function testDestroyCompanyWithoutPermission()
    {
        $company = (Company::all()->toArray())[0]["id"];

        $response = $this->withHeader(
            "Accept", "application/json")
            ->delete("/api/companies/$company");
        $response->assertStatus(401);
    }
//    public function testDestroyCompany()
//    {
//        $company = (Company::all()->toArray())[0]["id"];
//
//        $response = $this->withToken(HElp::$jwt)->withHeader(
//            "Accept", "application/json")
//            ->delete("/api/companies/$company");
//        $response->assertStatus(204);
//    }





}
