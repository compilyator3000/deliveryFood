<?php

namespace App\Http\Resources\Dish;

use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'weight' => $this->weight,
            'price' => $this->price,
            'description' => $this->description,
            'discount' => $this->discount,
            "active" => $this->active,


        ];
    }
}
