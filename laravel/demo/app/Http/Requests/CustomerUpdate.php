<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdate extends FormRequest
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
            'store_id' => 'bail|required',
            'first_name' => 'bail|required|max:15',
            'last_name' => 'bail|required|max:15',
            'email' => 'bail|required|max:50',
            'address_id' => 'bail|required',
        ];
    }
}
