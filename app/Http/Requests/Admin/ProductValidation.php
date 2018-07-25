<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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
            'name' => 'required|max:20',
            'description' => 'required',
            'unit_price' =>'required|max:8|min:4',
            'promotion_price' =>'required|max:8|min:4'
        ];
    }

     public function messages()
    {
        return [
            'name.required'=>'Không được để trống!',
            'name.max'=>'Tên danh mục không được quá 20 kí tự',
            'description.required'=>'Miêu tả không được để trống',
            'unit_price.required'=>'Giá tiền không được để trống',
            'unit_price.max'=>'Giá tiền không được quá 8 kí tự',
            'unit_price.min'=>'Giá tiền không được nhỏ hơn 4 kí tự',
            'promotion_price.required'=>'Giá ưu đãi không được để trống',
            'promotion_price.max'=>'Giá ưu đãi không được quá 8 kí tự',
            'promotion_price.min'=>'Giá ưu đãi không được nhỏ hơn 4 kí tự',
        ];
    }
}
