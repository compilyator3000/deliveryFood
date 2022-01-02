<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Resources\CategoryResourse;
use App\Models\Cafe;
use App\Models\Category;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return CategoryResourse::collection(Category::with("food")->get());
    }


    public function store(CategoryStoreRequest $request)
    {
        $request->cafe_id=$request->user()->id;
        $category=$request->validated();
        $category["cafe_id"]=$request->user()->id;
        $create_cafe = Category::create($category);
        return \response()->json(new CategoryResourse($create_cafe),200,[],JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show($id)
    {
        return  new CategoryResourse(Category::findOrFail($id));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id

     */
    public function update(CategoryStoreRequest  $request,$id)
    {


        $category=Category::findOrFail($id);

        if( Cafe::validCategory($category,$request->user()->id)) {
            $category->update($request->validated());
            return new CategoryResourse(Category::find($id));
        }
        return response()->json("Have not permission");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Cafe|\Illuminate\Http\JsonResponse|Response
     */
    public function destroy(Request $request,$id)
    {
        $category=Category::find( $id);
        if($category->cafe_id!=$request->user()->id){
            return response()->json("Have not permission");
        }
        $category->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
