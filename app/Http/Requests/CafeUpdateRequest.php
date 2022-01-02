<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CafeUpdateRequest extends FormRequest
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
            'email'=>'required|max:255',
            'location'=>'required|max:255',
            'status_of_working'=>'required|max:255',

        ];
    }
}
