<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\ForgotRequest;
use DateTime;
use Exception;
use App\Http\Requests\LoginRequest;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    // -----------------------------------------------------------------------------------
//Khu vực người dùng quên mật khẩu.
public function getForgot()
{
    return view('Admin.User.forgot');
}
public function postForgot(ForgotRequest $request)
{

     //Sau khi kiểm tra dữ liệu trống
    $email =  $request->email;
    $users = Users::where('email',$email)->first();
    if(!$users->count()){

        return redirect()->back()->with(['thongbao' => 'Email không tồn tại']);
    }
    else
    {
       $users->password = bcrypt('123456');
       $users->save();
       return redirect()->back()->with(['thongbao' => 'Mật khẩu đã được khôi phục']);
    }
}
//Kết thúc khu vực người dùng quên mật khẩu.
// -----------------------------------------------------------------------------------

}
