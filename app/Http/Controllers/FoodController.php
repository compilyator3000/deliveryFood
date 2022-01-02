<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodStoreRequest;
use App\Http\Resources\CategoryResourse;
use App\Http\Resources\FoodResource;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class FoodController extends Controller
{
    public function index(){
        return  FoodResource::collection(Food::all());
    }

    public function show($id){
        return  new FoodResource(Food::findorFail($id));
    }



    public function store(FoodStoreRequest $request)
    {

        $category=Category::where("cafe_id","=",$request->user()->id)->get();
        $category=$category->where("title","=",$request->category)->get(0);
       if(empty($category)){
          return response()->json("have not that category");

       }
        $food=$request->validated();
        $food["category_id"]="$category->id";
        $food["cafe_id"]="$category->cafe_id";
        $food = Food::create($food);
       // return $food;
        return response()->json(new FoodResource($food),200,[],JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
    }




    public function update(FoodStoreRequest $request,$id)
    {


        $food=Food::find( $id);
        //   dd($food);
        // dd(Category::findOrFail($food->category_id)->cafe_id);
        if(Category::findOrFail($food->category_id)->cafe_id!=$request->user()->id){
            return response()->json("Have not permission");
        }

        $food->update($request->validated());

        return new FoodResource($food);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Food|\Illuminate\Http\JsonResponse|Response
     */
    public function destroy(Request $request,$id)
    {
        $food=Food::find( $id);
        if(Category::findOrFail($food->category_id)->cafe_id!=$request->user()->id){
            return response()->json("Have not permission");
        }
        $food->delete();

        // Cafe::find($id)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
