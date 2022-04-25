<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCustommersRequest;
use App\Http\Requests\EditCustommersRequest;
use App\Http\Requests\ResetCustommersRequest;
use App\Models\Customers;
use App\Imports\CustomersImport;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;
class CustomersController extends Controller
{
// Tải danh sách khách hàng
    public function getList()    {
        
        $data['customers'] = Customers::paginate(5);
        return view('Admin.Customers.list',$data);
    }
// Đính kèm / Xuất danh sách khách hàng
        public function getImport(){
            return view('Admin.Customers.Import');
        }
        public function postImport(){
            Excel::import(new CustomersImport,request()->file('file'));           
            return redirect()->route('Customers.List')->with('thongbao', 'Chèn danh sách tài khoản thành công');
        }
        public function getExport() 
        {
            return Excel::download(new CustomersExport, 'Customers.xlsx');
        }
// ------------------------------------------------------------------------------------
// Bắt đầu Khu vực thêm thông tin người dùng

        public function getAdd()
        {
            return view('Admin.Customers.add');
        }
        public function postAdd(AddCustommersRequest $request)
        {
            $cus_name=$request->cus_name;            
            $cus_gender=$request->cus_gender;        
            $cus_birthday=$request->cus_birthday;
            $cus_phone=$request->cus_phone;
            $cus_identity_card=$request->cus_identity_card;
            $cus_address=$request->cus_address;            
            $cus_email=$request->cus_email;            
            $cus_password=$request->cus_password;
            $cus_re_password = $request->cus_re_password;            
            $cus_status=$request->cus_status;            
            $cus_time=$request->cus_time;
            
            if($cus_password==$cus_re_password){
                $custommers = Customers::where('cus_email',$cus_email)
                -> orwhere('cus_identity_card', $cus_identity_card)
                -> orwhere('cus_phone',$cus_phone)
                ->first();
                if($custommers==null){
                $custommers = new Customers;
                $custommers->cus_name=$cus_name;
                $custommers->cus_gender=$cus_gender;
                $custommers->cus_birthday=$cus_birthday;
                $custommers->cus_phone=$cus_phone;
                $custommers->cus_identity_card=$cus_identity_card;
                $custommers->cus_address=$cus_address;
                $custommers->cus_email=$cus_email;
                $custommers->cus_password=$cus_password;
                $custommers->cus_status=$cus_status;
                $custommers->cus_join= new DateTime();
                $custommers->created_at = new DateTime();
                $custommers->save();
                return redirect()->route('Customers.List')->with('thongbao', 'Tài khoản đã được thêm mới');
            }else
            {
                return redirect()->back()->with('thongbao','Hai mật khẩu không trùng khớp!');
            }

          

            }else{
                return redirect()->back()->with('thongbao','Dữ liệu đã bị trùng vui lòng kiểm tra lại');
            }

        }

// Kết thúc Khu vực thêm thông tin người dùng
// ------------------------------------------------------------------------------------
// Bắt đầu Khu vực sửa thông tin người dùng

    public function getEdit($id)
    {       
        $data['custommers'] = Customers::find($id);        
        return view('Admin.Customers.edit',$data);
    }
    public function Update(EditCustommersRequest $request,$id)
    {        
            $cus_name=$request->cus_name;            
            $cus_gender=$request->cus_gender;                        
            $cus_birthday=$request->cus_birthday;
            $cus_phone=$request->cus_phone;
            $cus_identity_card=$request->cus_identity_card;
            $cus_address=$request->cus_address;            
            $cus_email=$request->cus_email;                        
            $cus_status=$request->cus_status;  
            
            
           //Xử lý update            
            $custommers = Customers::find($id);
            $custommers->cus_name=$cus_name;
            $custommers->cus_gender=$cus_gender;
            $custommers->cus_birthday=$cus_birthday;
            $custommers->cus_phone=$cus_phone;
            $custommers->cus_identity_card=$cus_identity_card;
            $custommers->cus_address=$cus_address;
            $custommers->cus_email=$cus_email;            
            $custommers->cus_status=$cus_status;
            $custommers->cus_join= new DateTime();
            $custommers->created_at = new DateTime();
            $custommers->save();
            return redirect()->route('Customers.List')->with('thongbao', 'Thông tin khách hàng đã được cập nhật');
            
    }

// Kết thúc Khu vực sửa thông tin người dùng
// ------------------------------------------------------------------------------------
// Bắt đầu khu vực xóa bỏ thông tin khách hàng
    public function getDelete($id)
    {
        $del = Customers::find($id);
        $del->delete($id);
        return redirect()->route('Customers.List')->with('thongbao', 'Tài khoản đã được xóa bỏ');
    }
// Bắt đầu khu vực xóa bỏ thông tin khách hàng
// ------------------------------------------------------------------------------------
// Reset mat khau
    public function getReset($id)
    {
        
        $data['customers'] = Customers::find($id);        
        return view('Admin.Customers.reset',$data);
    }
    public function postReset(ResetCustommersRequest $request)
    {
        
        //Sau khi kiểm tra dữ liệu trống
        $cus_email =  $request->cus_email;        
        $customers = Customers::where('cus_email',$cus_email)->first();        
        if(!$customers){
            return redirect()->back()->with(['thongbao' => 'Email không tồn tại']);
        }
        else
        {
        $customers->cus_password = bcrypt('123456');
        $customers->save();
        return redirect()->back()->with(['thongbao' => 'Mật khẩu đã được khôi phục']);
        }
    }
// Kết thúc Reset mat khau
//-------------------------------------------------------------------------------------
}
