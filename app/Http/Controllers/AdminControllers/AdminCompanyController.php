<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Services\Control\Admin\AdminCompanyServices\CompanyInterfaces\AdminCompanyServiceInterface;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    private $companyService;

    public function __construct(
        AdminCompanyServiceInterface $companyService
    )
    {
        $this->companyService = $companyService;

    }
    public function index()
    {

return $this->companyService->getCompanies();
    }


    public function store(CompanyStoreRequest $request)
    {
        return \response()->json($this->companyService->createCompany($request->toArray()));
    }


    public function show($id)
    {
        return $this->companyService->findCompany($id);
    }


    public function update(CompanyUpdateRequest $request, $id)
    {
        return $this->companyService->updateCompany($id,$request->toArray());
    }

    public function destroy($id)
    {
        return $this->companyService->destroyCompany($id);
    }
}
