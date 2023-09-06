<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestCreateRequest extends FormRequest
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
            'sub_test_name'=>'required|string|min:2|max:160',
            'price'=>'required|numeric',
            'sample_type'=>'required',
            'volume'=>'required',
            'status'=>'required|boolean'
        ];
    }
}
