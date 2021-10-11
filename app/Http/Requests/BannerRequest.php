<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên không được bỏ trống',
            
            'image.image' => 'Image không hợp lệ'
            
        ];
    }
}
