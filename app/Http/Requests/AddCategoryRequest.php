<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'cat_name' => 'required | max:255',
        ];
    }
    public function messages(){
        return [
            // Kiểm tra dữ liệu nhập của họ và tên
            'cat_name.required' => 'Tên danh mục không được để trống',
            'cat_name.max' => 'Tên danh mục không được quá 255 ký tự',
        ];
    }
}
