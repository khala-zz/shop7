<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name' => 'required',
            'image_name' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên slider 1 không được bỏ trống',
            
            'image_name.image' => 'Image không hợp lệ'
            
        ];
    }
}
