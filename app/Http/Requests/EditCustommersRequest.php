<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCustommersRequest extends FormRequest
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
            'cus_name' => 'required | max:255', // họ và tên
            'cus_gender' => 'required', // giới tính
            'cus_birthday' => 'required | max:255', // ngày sinh
            'cus_phone' => 'required | max:10 | min:10', // số điện thoại
            'cus_identity_card' => 'required | max:12 | min:9', //cmnd
            'cus_address' => 'required | max:255', //địa chỉ
            'cus_email' => 'required | max:255 | email', // hòm thư                                  
            'cus_status' => 'required | max:255', //trạng thái  
           
        ];
    }
    public function messages(){
        return [
        // Kiểm tra dữ liệu nhập của họ và tên
            'cus_name.required' => 'Họ và tên không được để trống',
            'cus_name.max' => 'Họ và tên không được quá 255 ký tự',
           
        // Giới tính
            'cus_gender.required' => 'Giới tính không được để trống',
            
        // Kiểm tra dữ liệu nhập của ngày sinh
            'cus_birthday.required' => 'Ngày sinh không được để trống',            
            'cus_birthday.max' => 'Ngày sinh không được quá 255 ký tự',

        // Kiểm tra dữ liệu số điện thoại
            'cus_phone.required' => 'Số điện thoại không được để trống',
            'cus_phone.min' => 'Số điện thoại phải lớn hơn 10 ký tự',
            'cus_phone.max' => 'Số điện thoại phải nhỏ hơn 10 ký tự',
            
        // Kiểm tra dữ liệu cmnd
            'cus_identity_card.required' => 'Chứng minh nhân dân không được để trống',
            'cus_identity_card.min' => 'Chứng minh nhân dân không được nhỏ hơn 10 ký tự',
            'cus_identity_card.max' => 'Chứng minh nhân dân không được lớn hơn 10 ký tự',

        // Kiểm tra dữ liệu địa chỉ
            'cus_address.required' => 'Địa chỉ không được để trống',            
            'cus_address.max' => 'Địa chỉ không được lớn hơn 255 ký tự',

        // Kiểm tra dữ liệu email
            'cus_email.required' => 'Email không được để trống',
            'cus_email.max' => 'Email không được quá 255 ký tự',
            'cus_email.email' => 'Email không đúng định dạng',

        // Kiểm tra nhập dữ liệu trạng thái
            'cus_status.required' => 'Địa chỉ không được để trống',
            'cus_status.max' => 'Phân quyền không được quá 255 ký tự',
     
        ];
    }
}
