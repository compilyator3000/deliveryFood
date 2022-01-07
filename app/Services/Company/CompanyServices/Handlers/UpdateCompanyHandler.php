<?php


namespace App\Services\Company\CompanyServices\Handlers;


use App\Models\Company;
use App\Services\Company\CompanyServices\Repositories\EloquentCompanyRepository;


class UpdateCompanyHandler
{

    private $companyRepository;

    public function __construct(
        EloquentCompanyRepository $companyRepository
    )
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @param array $data
     */
    public function handle($id, array $data)//: Company
    {
        return $this->companyRepository->updateFromArray(Company::findOrFail($id), $data);
    }

}
