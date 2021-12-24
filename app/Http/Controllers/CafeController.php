<?php

namespace App\Http\Controllers;

use App\Http\Requests\CafeStoreRequest;
use App\Http\Resources\CafeResource;
use App\Models\Cafe;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        return  CafeResource::collection(Cafe::all());
    }//Cafe::with("categories")



    /**
     * Store a newly created resource in storage.
     *


     */
    public function store(CafeStoreRequest $request)
    {
        $create_cafe = Cafe::create($request->validated());

        return new CafeResource($create_cafe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show($id)
    {
        return  new CafeResource(Cafe::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
