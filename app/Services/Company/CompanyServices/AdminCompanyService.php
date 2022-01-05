<?php


namespace App\Services\Company\CompanyServices;

use App\Services\Control\Admin\AdminCompanyServices\CompanyInterfaces\AdminCompanyServiceInterface;
use App\Services\Company\CompanyServices\Handlers\UpdateCompanyHandler;
use App\Services\Control\Admin\AdminCompanyServices\CompanyServices\Repositories\EloquentCompanyRepository;

class AdminCompanyService implements AdminCompanyServiceInterface
{
    private $updateCompanyHandler;
    private $companyRepository;

    public function __construct(
        EloquentCompanyRepository $repository,
        UpdateCompanyHandler      $updateCompanyHandler

    )
    {
        $this->companyRepository = $repository;
        $this->updateCompanyHandler = $updateCompanyHandler;
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
        return $this->updateCompanyHandler->handle($id, $data);
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
