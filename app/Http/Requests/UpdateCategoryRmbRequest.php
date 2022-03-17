<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\CategoryRmb;

class UpdateCategoryRmbRequest extends FormRequest
{
    // private $categoryRmb;

    // public function __construct(CategoryRmb $categoryRmb){
    //     $this->categoryRmb = $categoryRmb;
    // }
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
            'title' => 'required',
        ];
    }
}
