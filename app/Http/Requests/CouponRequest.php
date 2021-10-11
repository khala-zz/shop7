<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'coupon_code' => 'required',
            'amount' => 'required|numeric',
            'amount_type' => 'required',
            'expiry_date' => 'required|date'
            
        ];
    }

    public function messages()
    {
        return [
            'coupon_code.required' => 'Mã giảm giá không được bỏ trống',
            'amount.required'  => 'Số lượng không được bỏ trống',
            'amount.numeric'  => 'Số lượng phải là số',
            'amount_type.required'  => 'Loại giảm giá không được bỏ trống',
            'expiry_date.required'  => 'Ngày kết thúc giảm giá không được bỏ trống',
            'expiry_date.date'  => 'Ngày kết thúc giảm giá phải hợp lệ'
        ];
    }
}
