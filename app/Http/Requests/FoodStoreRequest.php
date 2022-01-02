<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "category"=>"required",
            "title"=>"required",
            "weight"=>"required",
            "price"=>"required",
            "discount"=>"required",
            "active"=>"required",
            "description"=>"required"
        ];
    }
}
