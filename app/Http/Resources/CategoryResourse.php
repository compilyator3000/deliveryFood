<?php

namespace App\Http\Resources;

use App\Models\Cafe;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class CategoryResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'cafe_id'=>$this->cafe_id,
            'food'=>FoodResource::collection($this->food),


        ];
    }
}
