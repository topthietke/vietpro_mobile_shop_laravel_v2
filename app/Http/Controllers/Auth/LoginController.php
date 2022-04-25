<?php

namespace App\Http\Controllers\Auth;

use DateTime;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotRequest;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

// Kết thúc khu vực khai bao và thực cookie của laravel
    // -----------------------------------------------------------------------------------

// -----------------------------------------------------------------------------------
// Khu vực Đăng nhập hệ thống với csdl
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function getLogin()
    {
        dd('xin chào');
        return view('Admin.User.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request -> email;
        $password = $request -> password;
        $users = Users::where('email', $email)->first();
        //$count = $users -> count();
        if(!$users){
            return redirect()->back()->with('thongbao', 'Email không tồn tại! Vui lòng kiểm tra lại')->withInput();
        }
        else
        {
            $trangthai = $users -> status;

            if($trangthai==0)
            {
                if(isset($_COOKIE['error'])){
                    $dem = $_COOKIE['error'];
                }else{
                    $dem = 0;
                }


                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    //hủy hàm cookie nếu đăng nhập đúng
                    setcookie('error',$dem, time() - 3600);
                    unset($_COOKIE["error"]);
                    return redirect()->route('Admin.dashboard')->with('User',$email)->withInput();
                }
                else {
                    $dem++;
                    setcookie('error',$dem, time() + 3600);
                    if($dem<=3){
                        return redirect()->back()->with('thongbao', 'Tài khoản không hợp lệ ! (Bạn đã nhập sai '.$dem.' lần)')->withInput();
                    }
                    else{
                        // Sau khi đăng nhập sai quá số lần quy định hệ thông sẽ khóa không cho đăng nhập

                        //$users = Users::where('email', $email)->first();
                        $users->status = '1';
                        $users->save();
                        return redirect()->back()->with('thongbao', 'Tài khoản của bạn đã bị khóa! Do đã nhập sai 3 lần')->withInput();
                    }


                }
            }
            else
            {
                return redirect()->back()->with('thongbao', 'Tài khoản của bạn đã bị khóa! Liên hệ với quản trị để hỗ trợ')->withInput();
            }
        }
    }
// Kết thúc khu vực Đăng nhập hệ thống với csdl
// -----------------------------------------------------------------------------------

// -----------------------------------------------------------------------------------
// Đăng nhập bằng tài khoản google API
    public function getGoogle()
    {

        return Socialite::driver('google')->redirect();

    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {

            $google = Socialite::driver('google')->user();
            $finduser = Users::where('google_id', $google->id)->first();
            if ($finduser) {
                $user = Users::find($finduser->id);
                Auth::loginUsingId($user->id);
                if (Auth::check()) {
                    return redirect()->route('Admin.dashboard')->with('success', 'Đăng nhập thành công');
                }

            } else {

                //Kiểm tra nếu đã tồn tại acc gmail thực hiện ghi lại id thôi
                $users = Users::where('email', $google->email)->first();

                // if (!$users->count()) {
                if (!$users==null) {

                    $user = new Users;
                    //Gán giá trị cho các trường dữ liệu
                    $user->email = $google->email;
                    $user->password = bcrypt('123456');
                    $user->full = $google->name;
                    $user->phone = '0909123456';
                    $user->address = 'Việt Nam';
                    $user->level = 1;
                    $user->gender=0;
                    $user->status = 0;
                    $user->google_id = $google->id;
                    $user->created_at = new DateTime();
                    $user->save();

                }
                //Kiểm tra nếu ko tồn tại ghi mới
                else {

                    $users->google_id = $google->id;
                    $user->created_at = new DateTime();
                    $users->save();
                }
                // Kiểm tra login
                Auth::loginUsingId($user->id);
                if (Auth::check()) {

                    return redirect('Admin/dashboard')->with('success', 'Đăng nhập thành công');

                }

            }

        } catch (Exception $e) {

            return redirect('/Admin');
        }
    }
// Kết thúc Đăng nhập bằng tài khoản google API
// -----------------------------------------------------------------------------------

// -----------------------------------------------------------------------------------
// Khu vực đăng nhập facebook

    public function getFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function getCallback()
    {
        try {

            $facebook = Socialite::driver('facebook')->user();
            $finduser = Users::where('facebook_id', $facebook->id)->first();

            if ($finduser) {

                $user = Users::find($finduser->id);
                Auth::loginUsingId($user->id);
                if (Auth::check()) {

                    return redirect()->route('Admin.dashboard')->with('success', 'Đăng nhập thành công');
                }

            } else {

                $users = Users::where('email', $facebook->email)->first();

                if (!$users->count()) {
                    $user = new Users;
                    //Gán giá trị cho các trường dữ liệu
                    $user->email = $facebook->email;
                    $user->password = bcrypt('123456');
                    $user->full = $facebook->name;
                    $user->phone = '0909123444';
                    $user->address = 'Việt Nam';
                    $user->level = 1;
                    $user->status = 0;
                    $user->facebook_id = $facebook->id;
                    $user->created_at = new DateTime();
                    $user->save();
                } else {
                    $users->facebook_id = $facebook->id;
                    $users->created_at = new DateTime();
                    $users->save();
                }

                Auth::loginUsingId($user->id);
                if (Auth::check()) {
                    return redirect('/Admin/dashboard')->with('success', 'Đăng nhập thành công');
                }
            }

        } catch (Exception $e) {
            return redirect('/Admin');
        }
    }
// Kết thúc Khu vực đăng nhập facebook
// -----------------------------------------------------------------------------------

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



