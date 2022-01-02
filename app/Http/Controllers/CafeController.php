<?php

namespace App\Http\Controllers;

use App\Events\OrderEvent;
use App\Http\Requests\CafeStoreRequest;
use App\Http\Requests\CafeUpdateRequest;
use App\Http\Resources\CafeResource;
use App\Models\Cafe;
use App\Models\Food;
use App\Models\TelegramNotifier;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;


class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
1
     */
    public function index()
    {

       return  CafeResource::collection(Cafe::where("valid","=",'1')->get());
    }



    /**
     * Store a newly created resource in storage.
     *


     */
    public function store(CafeStoreRequest $request)
    {
        $temp=$request->validated();
        $temp['password']=password_hash($temp['password'],PASSWORD_BCRYPT);
        $create_cafe = Cafe::create($temp);
        return \response()->json(new CafeResource($create_cafe),200,[],JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show($id)
    {
        $cafe=Cafe::where("valid","=",'1');
        return  new CafeResource($cafe->findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return CafeResource
     */
    public function update(CafeUpdateRequest  $request)
    {

        $id=$request->user()->id;
        Cafe::where("id", $id)->update($request->validated());
        return new CafeResource(Cafe::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Cafe|Response
     */
    public function destroy(Request $request)
    {
        $id=$request->user()->id;
        Cafe::find($id)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
