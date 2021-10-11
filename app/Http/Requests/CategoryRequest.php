<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|unique:categories,title'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tên danh mục sản phẩm không được bỏ trống',
            'title.unique' => 'Tên danh mục sản phẩm đã tồn tại'
           
            
        ];
    }
}
