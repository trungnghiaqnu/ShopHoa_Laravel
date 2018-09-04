<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
            'name'=>'unique:categories,cate_name'//unique: co 2,4 tham so , ten bang va cot 
        ];
    }
    public function messages(){
        return [
            'name.unique'=>'Ten danh muc da bi trung !'
        ];
    }
}
