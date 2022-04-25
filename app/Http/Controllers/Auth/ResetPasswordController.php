<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\ForgotRequest;
use DateTime;
use Exception;
use App\Http\Requests\LoginRequest;
use App\Models\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    //-------------------------------------------------------------------------------------
//Reset mat khau
public function getReset($id)
{
    $data['users'] = Users::find($id);
    return view('Admin.User.reset',$data);
}
public function postReset(ForgotRequest $request)
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
// Kết thúc Reset mat khau
//-------------------------------------------------------------------------------------
}
