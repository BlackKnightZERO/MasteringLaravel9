<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title'         => 'required',
            'sku'           => 'required',
            'slug'          => 'required',
            'price'         => 'required',
            'category_id'   => 'required',
            'sub_title'     => 'nullable',
            'description'   => 'nullable',
            'tag_id'        => 'nullable',
        ];
    }
}
