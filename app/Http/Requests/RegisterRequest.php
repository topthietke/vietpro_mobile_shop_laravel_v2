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
            // 'user_full' => 'required | max:255',
            // 'user_pass' => 'required | min:6 | max:255',
            // 'user_email' => 'required | max:255 | min:4',
            // 'user_address' => 'required | max:255',
            // 'user_phone' => 'required | max:255',
            // 'user_phone' => 'required | max:255',
            // 'user_level' => 'required | max:255',
        ];
    }
    public function messages(){
        return [
            // Kiểm tra dữ liệu nhập Fullname
            'email.required' => 'Email không được để trống',


            'email.required' => 'Email không được để trống',
            'email.max' => 'Email không được quá 255 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải lớn hơn 6 ký tự'
        ];
    }
}
