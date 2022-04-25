<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DateTime;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Users;
//use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{
// ------------------------------------------------------------------------------------
// Khu vực thêm thông tin người dùng

        public function getAdd()
        {
            return view('Admin.User.add_user');
        }

        public function postAdd(AddUserRequest $request)
        {
            //Khai báo biến
            $fullname = $request -> FullName;
            $email = $request -> Email;
            $password = $request -> Password;
            $re_password = $request -> Re_Password;
            $address = $request -> Address;
            $phone = $request -> Phone;
            $gender = $request -> Gender;
            $level = $request -> level;

            //Kiểm tra trường hợp hai mật khẩu không trùng khớp
            if($password==$re_password){
                $users = Users::where('email', $email)->first();
                if($users){
                    return redirect()->back()->with('thongbao', 'Tài khoản đã tồn tại');
                }
                else{
                    $user = new Users;
                    //Gán giá trị cho các trường dữ liệu
                    $user->full = $fullname;
                    $user->email = $email;
                    $user->password = bcrypt($password);
                    $user->phone = $phone;
                    $user->address = $address;
                    if($gender='Nam'){
                        $user->gender = '0';
                    }
                    else{
                        $user->gender = '1';
                    }

                    if($level='Quản trị'){
                        $user->level = 0;
                    }
                    else{
                        if($level='Người dùng'){
                            $user->level = 1;
                        }
                    }

                    $user->status = 0;
                    $user->created_at = new DateTime();
                    $user->save();
                    return redirect()->route('User.List')->with('thongbao', 'Tài khoản đã được thêm mới');
                }



            }
            else{

                return redirect()->back()->with('thongbao', 'Hai mật khẩu chưa trùng khớp');
            }




        }
// Kết thúc Khu vực thêm thông tin người dùng
// ------------------------------------------------------------------------------------
// Khu vực import danh sách thành viên
    public function getImport(){
        return view('Admin.User.Import');
    }
    public function postImport(){
        Excel::import(new UsersImport,request()->file('file'));           
        return redirect()->route('User.List')->with('thongbao', 'Chèn danh sách tài khoản thành công');
    }
    public function getExport() 
    {
        return Excel::download(new UsersExport, 'Users.xlsx');
    }
// Kết thúc Khu vực import danh sách thành viên
// ------------------------------------------------------------------------------------
// Khu vực thông tin người dùng

        public function getProfile($id)
        {
            $user = Users::find($id);
            return view('Admin.User.profile',compact('user'));
        }
// Kết thúc Khu vực thông tin người dùng
// ------------------------------------------------------------------------------------
// Đăng xuất tài khoản
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('Admin.Login');
    }
// Kết thúc khu vực đăng xuất tài khoản
//-------------------------------------------------------------------------------------
// Load danh sách thành viên
        public function getList()
        {
            // $users = DB::table('users')->orderby('id','desc')->limit(5)->get();
            $data['users'] = Users::paginate(5);
            return view('Admin.User.list',$data);
        }
// Kết thúc Load danh sách thành viên
//-------------------------------------------------------------------------------------
// Cập nhật thông tin cho thành viên
        public function getEdit($id)
        {
            $data['users'] = Users::find($id);
            return view('Admin.User.edit_user',$data);
        }
        public function postEdit(UpdateUserRequest $request)
        {

            //Khai báo biến
            $fullname = $request -> FullName;
            $email = $request -> Email;
            $address = $request -> Address;
            $phone = $request -> Phone;
            $gender = $request -> Gender;
            $level = $request -> level;
            $id = $request -> id;

            $users = Users::find($id);
            //Gán giá trị cho các trường dữ liệu
            $users->full = $fullname;
            $users->email = $email;
            $users->phone = $phone;
            $users->address = $address;
            if($gender=='0'){
                $users->gender = '0';
            }
            else{
                $users->gender = '1';
            }

            if($level=='0'){

                $users->level = '0';

            }
            else{
                    $users->level = '1';
            }

            $users->status = 0;
            $users->created_at = new DateTime();
            $users->save();
            return redirect()->route('User.List')->with('thongbao', 'Cập nhật tài khoản thành công');

        }     

// Cập nhật thông tin cho thành viên
//-------------------------------------------------------------------------------------
// Reset mat khau
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
            if(!$users){

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
// Bắt đầu khu vực xóa thành viên
    public function getDelete($id)
    {
        $del = Users::find($id);
        $del->delete($id);
        // $del -> save();
        return redirect()->route('User.List')->with('thongbao', 'Tài khoản đã được xóa bỏ');
    }
// Kết thúc khu vực xóa thành viên
}

