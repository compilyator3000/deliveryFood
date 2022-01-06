<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
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

    public function testGetCompanies()
    {
        $response = $this->get('/api/companies');

        $response->assertStatus(200);
    }

    public function testGetCompany()
    {
        $response = $this->get('/api/companies/1');

        $response->assertStatus(200);
    }

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

}
