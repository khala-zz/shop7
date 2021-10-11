<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'product_code' => 'required',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            //'discount' => 'min:0|max:100',
            'category_id' => 'required',
            //'discount_start_date' => 'date',
            //'discount_end_date' => 'date|after:discount_start_date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp',
            'multi-image.*' => 'image|mimes:jpeg,png,jpg,gif,webp'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tên sản phẩm không được bỏ trống',
            'product_code.required' => 'Mã sản phẩm không được bỏ trống',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'price.numeric'  => 'Giá phải là số',
            'amount.required'  => 'Số lượng không được bỏ trống',
            'amount.numeric'  => 'Số lượng phải là số',
            //'discount.min' => 'Giảm giá tối thiểu là 0',
            //'discount.max' => 'Giảm giá tối đa là 100',
            'category_id.required'  => 'Chưa chọn danh mục',
            //'discount_start_date.date'  => 'Ngày bắt đầu giảm giá phải hợp lệ',
            //'discount_end_date.date'  => 'Ngày kết thúc giảm giá phải hợp lệ',
            //'discount_end_date.after'  => 'Ngày kết thúc giảm giá phải sau ngày bắt đầu giảm giá',
            'image.image' => 'Hình ảnh không hợp lệ',
            'multi-image.image' => 'Hình ảnh không hợp lệ' 
        ];
    }
}
