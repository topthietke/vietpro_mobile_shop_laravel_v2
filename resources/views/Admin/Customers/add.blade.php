
@extends('Admin.Master.Master')
@section('title', 'Đăng ký khách hàng')
@section('content')
<link rel="stylesheet" href="css/style-register.css">
    <div class="wrapper">
    
        <div class="inner">    
          
            <form action="" method="POST">
                @csrf
                <div class="header">                   
                    <h3>
                        <strong> ĐĂNG KÝ KHÁCH HÀNG </strong>
                    </h3>
                    {{--  Tiêu đề  --}}
                    @if (session('thongbao'))
                            <div ><h4 class="alert alert-success">{{ session('thongbao')}}</h4></div>
                    @endif         
                </div>                            
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực tên khách hàng -->
                    <div class="form-wrapper">
                        <i class="zmdi zmdi-account"></i>
                        <input type="text" name="cus_name" placeholder="Nhập họ tên khách hàng" class="form-control">
                            @if ($errors->has('cus_name'))
                            <div class="text-danger ">{{ $errors->first('cus_name') }}</div>
                            @endif
                    </div>
                <!-- Kết thúc khu vực tên của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Kết thúc khu vực giới tính của khách hàng -->
                    <div class="form-wrapper">
                        <select name="cus_gender" class="form-control">
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('cus_gender'))
                            <div class="text-danger ">{{ $errors->first('cus_gender') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực giới tính của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực ngày tháng năm sinh của khách hàng -->
                    <div class="form-wrapper">
                        <i class="zmdi zmdi-calendar"></i>
                        <input type="text" name="cus_birthday" placeholder="Nhập ngày sinh của khách hàng" class="form-control">
                            @if ($errors->has('cus_birthday'))
                            <div class="text-danger ">{{ $errors->first('cus_birthday') }}</div>
                            @endif
                    </div>
                <!-- Kết thúc khu vực ngày tháng năm sinh của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực số điện thoại của khách hàng -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_phone" placeholder="Nhập số điện thoại" class="form-control">
                        <i class="zmdi zmdi-phone"></i>
                        <p>
                            @if ($errors->has('cus_phone'))
                            <div class="text-danger lbl-phone">{{ $errors->first('cus_phone') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực số điện thoại của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực CMND -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_identity_card" placeholder="Nhập CMND của khách hàng" class="form-control">
                        <i class="zmdi zmdi-card"></i>
                        <p>
                            @if ($errors->has('cus_identity_card'))
                            <div class="text-danger ">{{ $errors->first('cus_identity_card') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực CMND -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực địa chỉ của khách hàng -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_address" placeholder="Nhập số địa chỉ của khách hàng" class="form-control">
                        <i class="zmdi zmdi-home"></i>
                        <p>
                            @if ($errors->has('cus_address'))
                            <div class="text-danger ">{{ $errors->first('cus_address') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực địa chỉ của khách hàng -->                
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực email của khách hàng -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_email" placeholder="Nhập địa chỉ hòm thư" class="form-control">
                        <i class="zmdi zmdi-email"></i>
                        <p>
                            @if ($errors->has('cus_email'))
                            <div class="text-danger ">{{ $errors->first('cus_email') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực email của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực mật khẩu của khách hàng -->
                    <div class="form-wrapper">
                        <input type="password" name="cus_password" placeholder="Nhập mật khẩu" class="form-control">
                        <i class="zmdi zmdi-lock"></i>
                        <p>
                            @if ($errors->has('cus_password'))
                            <div class="text-danger ">{{ $errors->first('cus_password') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực mật khẩu của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắc đầu khu vực nhắc lại mật khẩu của khách hàng -->
                    <div class="form-wrapper">
                        <input type="password" name="cus_re_password" placeholder="Nhắc lại mật khẩu" class="form-control">
                        <i class="zmdi zmdi-lock"></i>
                        <p>
                            @if ($errors->has('cus_re_password'))
                            <div class="text-danger ">{{ $errors->first('cus_re_password') }}</div>
                            @endif
                        </p>

                    </div> 
                <!-- Kết thúc khu vực nhắc lại mật khẩu của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắc đầu khu vực trạng thái của khách hàng -->  
                    <div class="form-wrapper">
                        <select name="cus_status" id="" class="form-control">
                            <option value="" disabled selected>Chọn trạng thái</option>
                            <option value="0">Không hoạt động</option>
                            <option value="1">Đang hoạt động</option>                                    
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('cus_status'))
                            <div class="text-danger ">{{ $errors->first('cus_status') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực trạng thái của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <div class="form-wrapper">
                    <input type="submit" class="btn btn-info" value="Đăng ký thông tin" class="form-control">
                </div>          
            </form>
            <div style="margin-top:150px" class="image-holder">
                <img src="img/customer.png" alt="">
            </div>
        </div>
    </div>
@endsection


