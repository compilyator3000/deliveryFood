<?php

namespace App\Services\Company\CompanyInterfaces;

interface CompanyServiceInterface
{
    public function getCompanies();

    public function createCompany(array $data = []);

    public function updateCompany(int $id, array $data);

    public function findCompany(int $id);

    public function destroyCompany(int $id):bool;


}
