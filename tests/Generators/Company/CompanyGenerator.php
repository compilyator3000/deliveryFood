<?php

namespace Tests\Generators\Company;

use App\Models\Category;
use App\Models\Company;

class CompanyGenerator
{

    public static function createCompanyUseFactory(int $count){
        return  Company::factory()->count($count)->create();

    }

}
