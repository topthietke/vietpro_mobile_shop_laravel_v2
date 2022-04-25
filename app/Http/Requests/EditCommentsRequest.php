<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCommentsRequest extends FormRequest
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
            'cus_id' => 'required',
            'prd_id' => 'required',
            'com_status' => 'required',
            'com_detail' => 'required',

        ];
    }
    public function messages(){
        return [
            // Kiểm tra dữ liệu nhập của họ và tên
            'cus_id.required' => 'Mục khách hàng không được để trống',
            'prd_id.required' => 'Mục sản phẩm không được để trống',
            'com_status.required' => 'Mục trạng thái không được để trống',
            'com_detail.required' => 'Mục nội dung không được để trống',
        ];
    }
}
