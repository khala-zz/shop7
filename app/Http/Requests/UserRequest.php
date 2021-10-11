<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên tài khoản không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.unique' => 'Email đã đăng kí, vui lòng chọn email khác',
            'email.email' => 'Email không hợp lệ',
            'image.image' => 'Image không hợp lệ'
            
        ];
    }
}
