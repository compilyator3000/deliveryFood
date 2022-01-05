<?php
/**
 * Description of CityRepository.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Company\CompanyServices\Repositories;


use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\Log;

class EloquentCompanyRepository
{
    public function getCompanies()
    {
        return CompanyResource::collection(Company::all());
    }


    public function find(int $id)
    {
        return CompanyResource::make(Company::find($id));
    }


    public function createFromArray(array $data)
    {



            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $create_Company = Company::create($data);
            Log::alert();
            return CompanyResource::make($create_Company);


    }

    public function updateFromArray(Company $company, array $data)
    {
        $company->update($data);
        return $company;
    }

    public function destroy(int $id)
    {
        if (Company::find($id)->delete()) {
            return true;
        }


    }
}
