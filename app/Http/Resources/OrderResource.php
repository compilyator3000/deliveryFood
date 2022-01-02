<?php

namespace App\Http\Resources;

use App\Http\Requests\OrderItemRequest;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *


     */
    public function toArray($request)
    {

        return [
            "token_order"=>$this->token_order,
            "food_id"=>$this->food_id,
            "count"=>$this->count,
            "customer"=>$this->customer,
            "phone"=>$this->phone,


        ];
    }
}
