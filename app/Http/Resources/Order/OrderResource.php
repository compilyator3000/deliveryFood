<?php

namespace App\Http\Resources\Order;

use App\Models\OrderItem;

use Illuminate\Http\Resources\Json\JsonResource;


class OrderResource extends JsonResource
{
    public function toArray($request)
    {


        return [
            "token_order" => $this->token_order,
            "executed" => $this->executed,
            "deadline" => $this->deadline,
            "customer" => $this->customer,
            "phone" => $this->phone,
            "delivery_type" => $this->delivery_type,
            "result_sum" => $this->result_sum,

            "dishes" => OrderItem::query()->where("order_id", "=", $this->id)->get()


        ];
    }
}
