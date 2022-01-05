<?php

namespace App\Services\Order\OrderServices\Repositories;


use App\Http\Resources\Order\CreateOrderResource;
use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;

class EloquentOrderRepository
{
    public function getOrders(int $idCompany)
    {
        $allOrders = Order::query()->where("company_id","=",$idCompany)->get();
        return CreateOrderResource::collection($allOrders);
    }


    public function find(int $idCompany,int $token)
    {

        $orders = Order::query()->where("token_order","=",$token)->get();
        return CreateOrderResource::collection($orders);

    }


    public function createFromArray(array $order)
    {
        extract($order);
        $company_id = Dish::query()->findOrFail($order["data"][0]["dish_id"])->company_id;

        $token = rand(9999,100000000);
        $mainOrder = Order::query()->create([
            "token_order" => $token,
            "result_sum" => $this->getReusltSum($order),
            "executed" => 0,
            "delivery_type" => $delivery_type,
            "phone" => $phone,
            "deadline" => date("Y:m:d H:i:s",$deadline),
            "customer" => $customer,
            "company_id" => $company_id,
        ]);
        foreach ($data as $dish) {
            OrderItem::create(
                [
                    "order_id" => $mainOrder->id,
                    "dish_id" => Dish::query()->where("company_id","=",$company_id)->findOrFail($dish["dish_id"])->id,
                    "count" => $dish["count"],
                    "price" => Dish::query()->find($dish["dish_id"])->id
                ]);

        }
        return CreateOrderResource::make($mainOrder);


    }

    public function updateFromArray(Model $order)
    {
        $order->executed = 1;
        return $order;
    }

    public function destroy(Model $order)
    {


        if ($order->delete()) {
            return true;
        }
    }

    private function getReusltSum(array $order)
    {
        $resultSum = null;
        foreach ($order["data"] as $dish) {
            $resultSum += Dish::query()->find($dish["dish_id"])->price;
        }
        return $resultSum;
    }
}
