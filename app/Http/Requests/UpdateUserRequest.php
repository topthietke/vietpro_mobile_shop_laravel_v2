<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'FullName' => 'required | max:255',
            'Email' => 'required | max:255 | email',
            'Address' => 'required',
            'Phone' => 'required | min:8 | max:10',
            'Gender' => 'required | max:255',
            'level' => 'required | max:255'
        ];
    }
    public function messages(){
        return [
            // Kiểm tra dữ liệu nhập của họ và tên
            'FullName.required' => 'Họ và tên không được để trống',
            'FullName.max' => 'Họ và tên không được quá 255 ký tự',

            // Kiểm tra dữ liệu nhập của email
            'Email.required' => 'Email không được để trống',
            'Email.email' => 'Email không đúng định dạng',
            'Email.max' => 'Email không được quá 255 ký tự',

            // Kiểm tra dữ liệu số điện thoại
            'Phone.required' => 'Số điện thoại không được để trống',
            'Phone.min' => 'Số điện thoại không được nhỏ hơn 8 ký tự',
            'Phone.max' => 'Số điện thoại không được lớn hơn 10 ký tự',

            // Kiểm tra dữ liệu giới tính
            'Gender.required' => 'Giới tính không được để trống',
            'Gender.max' => 'Giới tính không được quá 255 ký tự',

            // Kiểm tra dữ liệu phân quyền
            'level.required' => 'Phân quyền không được để trống',
            'level.max' => 'Phân quyền không được quá 255 ký tự',

            // Kiểm tra nhập dữ liệu Địa chỉ
            'Address.required' => 'Địa chỉ không được để trống'
        ];
    }
}
