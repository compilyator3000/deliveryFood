<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Services\Control\Admin\AdminCompanyServices\CompanyInterfaces\AdminCompanyServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CompanyController extends Controller
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


    public function update(CompanyUpdateRequest $request)//можно ли тут так делать?????
    {
        $id = $request->user()->id;
        return CompanyResource::make($this->companyService->updateCompany($id, $request->toArray()));
    }


    public function destroy(Request $request)
    {
        $id = $request->user()->id;
        if ($this->companyService->destroyCompany($id)) {
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return response("failed delete", Response::HTTP_NOT_FOUND);//правильный ли тут код????


    }
}
