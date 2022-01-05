<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'location' => $this->location,
            'status_of_working' => $this->status_of_working,
            'town' => $this->town,
            'description' => $this->description,
            'created_at' => $this->created_at,


        ];
    }
}
