<?php

namespace App\Http\Controllers;

use App\Events\OrderEvent;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\OrderExecuteRequest;
use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\FoodResource;
use App\Http\Resources\OrderResource;
use App\Models\Cafe;
use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use GuzzleHttp\Promise\Create;
use http\Env\Response;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        return  OrderResource::collection(Order::query()->where("cafe_id","=",$request->user()->id)->get());
    }

    public function show($token){


        return  OrderResource::collection(Order::where("token_order","=",$token)->get());
    }



    public function store(Request $request){//тарблы есть
        $data=$request->json()->all()["data"];
        $customer=$request->json()->all()["customer"];
        $deadline=$request->json()->all()["deadline"];//время когда заказ уже должен быть готов в формате Unix
        // dd($deadline);
        $phone=$request->json()->all()["phone"];

        $token=rand(9999,100000000);

        foreach ($data as $food){


            Order::create(
                ["token_order"=>$token,
                    "executed"=>0,
                    "food_id"=>$food["food_id"],
                    "cafe_id"=>Food::query()->find($food["food_id"])->cafe_id,
                    "phone"=>$phone,
                    "deadline"=>date("Y:m:d H:i:s",$deadline),
                    "customer"=>$customer,
                    "count"=>$food["count"]


                ]);

        }
        event(new OrderEvent("You have a new order"));
        return $token;

    }

    public function destroy(Request $request,$token)//тарблы есть
    {

        $orders=Order::query()->where("cafe_id","=",$request->user()->id)->get();
        $order= $orders->where("token_order","=",$token);

        if(empty($order->all())){
            return response()->json(null,204);
        }

        $order->toQuery()->delete();
        return response()->json(null,200);

    }


    public function update(Request $request,$token)
    {
        $orders=Order::query( )->where('token_order',"=",$token)->get();
        $orders=$orders->all();

        foreach ($orders as $order) {
            if(!$order->cafe_id){
                return response()->json("Have not permission",403);
            }
        }

        foreach ($orders as $order){
            $order->executed=1;
            $order->update();
        }
        return response()->json("update is successful",200);
    }
}
