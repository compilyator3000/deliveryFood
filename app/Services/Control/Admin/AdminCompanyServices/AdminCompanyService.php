<?php


namespace App\Services\Control\Admin\AdminCompanyServices;

use App\Services\Control\Admin\AdminCompanyServices\CompanyInterfaces\AdminCompanyServiceInterface;
use App\Services\Company\CompanyServices\Handlers\UpdateCompanyHandler;
use App\Services\Control\Admin\AdminCompanyServices\CompanyServices\Repositories\EloquentCompanyRepository;

class AdminCompanyService implements AdminCompanyServiceInterface
{
    private $companyRepository;

    public function __construct(
        EloquentCompanyRepository $repository

    )
    {
        $this->companyRepository = $repository;

    }

    public function getCompanies()
    {
        return $this->companyRepository->getCompanies();
    }

    public function createCompany(array $data = [])
    {
        return $this->companyRepository->createFromArray($data);
    }

    public function updateCompany(int $id, array $data)
    {
        return $this->companyRepository->handle($id, $data);
    }

    public function findCompany(int $id)
    {
        return $this->companyRepository->find($id);
    }

    public function destroyCompany(int $id): bool
    {
        return $this->companyRepository->destroy($id);
    }
}
