<?php
/**
 * Description of CityRepository.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Control\Admin\AdminCompanyServices\CompanyServices\Repositories;


use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;

class EloquentCompanyRepository
{
    public function getCompanies()
    {
        return Company::all();
    }


    public function find(int $id)
    {
        return Company::find($id);
    }


    public function createFromArray(array $data): CompanyResource
    {

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $create_Company = Company::create($data);
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
