<?php

namespace App\Http\Controllers;

use App\Events\StoreImageCompanyEvent;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Services\Company\CompanyInterfaces\CompanyServiceInterface;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Log;


class CompanyController extends Controller
{
    private $companyService;

    public function __construct(
        CompanyServiceInterface $companyService
    )
    {
        $this->companyService = $companyService;

    }


    public function index()
    {
        Log::info("get all company");
        return CompanyResource::collection($this->companyService->getCompanies());

    }


    public function store(CompanyStoreRequest $request)
    {
        $company=$this->companyService->createCompany($request->toArray());
        if($company==false){
            return \response()->json("Company already exists",400);
        }
        if(!empty($request->file("image")))
            event(new StoreImageCompanyEvent($company->id, $request->file("image")));
        return \response()->json();
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
