<?php

namespace Tests\Feature;


use App\Models\Company;
use App\Validators\HElp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{

    // use RefreshDatabase;
    //пробовал прописать здесь jwt, прокидывать его тут и выполнять тесты, затея плохая потому что
    //и тесты ложатся иногода чисто из-зи того что jwt просрочился и прокидывание занимает время. А мы ж то тесты
    //пишем чтобы это время не занимать отладкой ручками:)
//    use RefreshDatabase;
//    /**
//     * A basic feature test example.
//     *
//     * @return void
//     */
//        private $jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2NDE0MDQ1MzEsImV4cCI6MTY0MTQwODEzMSwibmJmIjoxNjQxNDA0NTMxLCJqdGkiOiJmZG9acHJZTDBIaFp5UjN6Iiwic3ViIjoxLCJwcnYiOiJjZmU3ZWM5OWEyM2Y0Mzg4ZTdmMWQ1ZmI4NzA4Mzc1Yzg1NGVkYTY0IiwiaWQiOjF9.3SEvjX_-d7fgLeCJWob6Eg1Ya8lXMpx7vE3veD_QDiw";
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
          var_dump(HElp::$jwt);
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

        // $response->assertStatus(200);
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

        $response = $this->withHeaders([
            "Accept" => "application/json",
            "Authorisation"=> "Bearer " . HElp::$jwt])
            ->patch("/api/companies/$company", [
            "description" => "update data after testing"
        ]);
        //dd(HElp::$jwt);
        dd($response);
        $response->assertStatus(401);
        //$response->assertOk()->assertJsonMissing([  "description" => "update data after testing"]);
    }


}
