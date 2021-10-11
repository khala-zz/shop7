<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'setting_key' => 'required',
            'setting_value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'setting_key.required' => 'Tên setting không được bỏ trống',
            'setting_value.required' => 'Nội dung setting không được bỏ trống'
           
            
        ];
    }
}
