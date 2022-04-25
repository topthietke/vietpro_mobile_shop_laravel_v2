<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'cat_name' => 'required',
            'prd_name' => 'required | max:255',
            'prd_code' => 'required | max:255',
            'prd_price' => 'required',
            'prd_warranty' => 'required | max:255',
            'prd_accessories'=> 'required | max:255',
            'prd_promotion' => 'required | max:255',
            'prd_new' => 'required | max:255',
            'prd_image' => 'required',
            'prd_status' => 'required | max:255',
            'prd_details' => 'required',


        ];
    }
    public function messages()
    {
        return [
            // Kiểm tra dữ liệu nhập của danh mục
                'cat_name.required' => 'Danh mục không được để trống',
            // Kiểm tra dữ liệu nhập của tên sản phẩm
                'prd_name.required' => 'Tên sản phẩm không được để trống',
                'prd_name.max' => 'Tên sản phẩm không được quá 255 ký tự',
            // Kiểm tra dữ liệu của mã sản phẩm
                'prd_code.required' => 'Mã sản phẩm không được để trống',
                'prd_code.max' => 'Mã sản phẩm không được quá 255 ký tự',
            // Kiểm tra dữ liệu nhập của giá sản phẩm
                'prd_price.required' => 'Giá sản phẩm không được để trống',
            // Kiểm tra dữ liệu bảo hành
                'prd_warranty.required' => 'Thời gian bảo hành không được để trống',
                'prd_warranty.max' => 'Thời gian bảo hành không được quá 255 ký tự',
            // Kiểm tra dữ liệu phụ kiện
                'prd_accessories.required' => 'Phụ kiện không được để trống',
                'prd_accessories.max' => 'Phụ kiện không được quá 255 ký tự',
            // Kiểm tra dữ liệu khuyến mại
                'prd_promotion.required' => 'Khuyến mãi không được để trống',
                'prd_promotion.max' => 'Khuyến mãi không được quá 255 ký tự',
            // Kiểm tra dữ liệu tình trạng
                'prd_new.required' => 'Tình trạng không được để trống',
                'prd_new.max' => 'Tình trạng không được quá 255 ký tự',
            // Kiểm tra dữ liệu ảnh sản phẩm
                'prd_image.required' => 'Ảnh sản phẩm không được để trống',
            // Kiểm tra nhập dữ liệu trạng thái (còn hàng hoặc hết hàng)
                'prd_status.required' => 'Trạng thái không được để trống',
                'prd_status.max' => 'Trạng thái không được quá 255 ký tự',
            // Mô tả chi tiết
                'prd_details.required' => 'Mô tả không được để trống'

        ];
    }
}

