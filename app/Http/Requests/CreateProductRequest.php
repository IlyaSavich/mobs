<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProductRequest extends Request
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
//            'title' => 'required|min:2|max:255',
//            'categories_id' => 'required',
//            'price' => 'required|min:0',
//            'quantity' => 'required|min:0',
//            'description' => 'string',
        ];
    }
}
