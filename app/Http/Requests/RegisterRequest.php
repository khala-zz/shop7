<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên tài khoản không được bỏ trống',
            'name.max' => 'Tên tài khoản không được quá 255 kí tự',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.confirmed' => 'Mật khẩu nhập lại chưa chính xác',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'email.required' => 'Email không được bỏ trống',
            'email.unique' => 'Email đã đăng kí, vui lòng chọn email khác',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không được quá 255 kí tự'
        ];
    }
}
