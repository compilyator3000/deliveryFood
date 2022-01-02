<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Resources\Json\JsonResource;

class CafeResource extends JsonResource
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
            'location'=>$this->location,
            'status_of_working'=>$this->status_of_working,
            'town'=>$this->town,
            'description'=>$this->description,
            'created_at'=>$this->created_at,
            'categories'=>CategoryResourse::collection($this->categories),

        ];
    }
}
