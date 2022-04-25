
@extends('Admin.Master.Master')
@section('title','Cập nhật thông tin khách hàng')
@section('content')
<link rel="stylesheet" href="css/style-register.css">
    <div class="wrapper">
        <div class="inner">
            <form action="{{route('Customers.Update', ['id' => $custommers->id])}}" method="POST">
                @csrf
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu tiêu đề và thông báo của của page -->
                    <div class="header">
                        {{--  Tiêu đề  --}}
                        <h3>
                            <strong> CẬP NHẬT THÔNG TIN KHÁCH HÀNG </strong>
                        </h3>
                        @if (session('thongbao'))
                                <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
                        @endif
                    </div>                            
                <!-- Kết thúc tiêu đề và thông báo của của page -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực tên khách hàng -->
                    <div class="form-wrapper">
                        <i class="zmdi zmdi-account"></i>
                        <input type="text" name="cus_name" value="{{$custommers->cus_name}}" class="form-control">
                            @if ($errors->has('cus_name'))
                            <div class="text-danger lbl-email">{{ $errors->first('cus_name') }}</div>
                            @endif
                    </div>
                <!-- Kết thúc khu vực tên của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Kết thúc khu vực giới tính của khách hàng -->
                    <div class="form-wrapper">
                        <select name="cus_gender" class="form-control">
                            <!-- <option value="" disabled selected>Chọn giới tính</option> -->
                            <option @if($custommers->cus_gender==1) selected @endif value="1">Nam</option>
                            <option @if($custommers->cus_gender==0) selected @endif value="0">Nữ</option>
                            <option @if(($custommers->cus_gender!=1)&&($custommers->cus_gender!=0)) selected @endif value="Khác">Khác</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('cus_gender'))
                            <div class="text-danger lbl-email">{{ $errors->first('cus_gender') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực giới tính của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực ngày tháng năm sinh của khách hàng -->
                    <div class="form-wrapper">
                        <i class="zmdi zmdi-calendar"></i>
                        <input type="text" name="cus_birthday" value="{{$custommers->cus_birthday}}" class="form-control">
                            @if ($errors->has('cus_birthday'))
                            <div class="text-danger lbl-email">{{ $errors->first('cus_birthday') }}</div>
                            @endif
                    </div>
                <!-- Kết thúc khu vực ngày tháng năm sinh của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực số điện thoại của khách hàng -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_phone" value="{{$custommers->cus_phone}}" class="form-control">
                        <i class="zmdi zmdi-phone"></i>
                        <p>
                            @if ($errors->has('cus_phone'))
                            <div class="text-danger lbl-phone">{{ $errors->first('cus_phone') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực ngày tháng năm sinh của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực CMND -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_identity_card" value="{{$custommers->cus_identity_card}}" class="form-control">
                        <i class="zmdi zmdi-card"></i>
                        <p>
                            @if ($errors->has('cus_identity_card'))
                            <div class="text-danger lbl-email">{{ $errors->first('cus_identity_card') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực CMND -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực địa chỉ của khách hàng -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_address" value="{{$custommers->cus_address}}" class="form-control">
                        <i class="zmdi zmdi-home"></i>
                        <p>
                            @if ($errors->has('cus_address'))
                            <div class="text-danger lbl-email">{{ $errors->first('cus_address') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực địa chỉ của khách hàng -->
                <!---------------------------------------------------------------------------------------------->                
                <!-- Bắt đầu khu vực email của khách hàng -->
                    <div class="form-wrapper">
                        <input type="text" name="cus_email" value="{{$custommers->cus_email}}" class="form-control">
                        <i class="zmdi zmdi-email"></i>
                        <p>
                            @if ($errors->has('cus_email'))
                            <div class="text-danger lbl-email">{{ $errors->first('cus_email') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực email của khách hàng -->
                <!---------------------------------------------------------------------------------------------->               
                <!-- Bắc đầu khu vực trạng thái của khách hàng -->  
                    <div class="form-wrapper">
                        <select name="cus_status" id="" class="form-control">                            
                            <option @if($custommers->cus_status==0) selected @endif value="0">Không hoạt động</option>
                            <option @if($custommers->cus_status==1) selected @endif value="1">Đang hoạt động</option>                                    
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('cus_status'))
                            <div class="text-danger lbl-email">{{ $errors->first('cus_status') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực trạng thái của khách hàng -->
                <!---------------------------------------------------------------------------------------------->              
                <!-- Bắt đầu nút đăng ký thông tin -->
                    <div class="form-wrapper">
                        <input type="submit" class="btn btn-info" value="Cập nhật thông tin" class="form-control">
                    </div>          
                <!-- Kết thúc nút đăng ký thông tin -->
                <!---------------------------------------------------------------------------------------------->     
            </form>
            <div style="margin-top:150px" class="image-holder">
                <img src="img/customer.png" alt="">
            </div>
        </div>
    </div>
@endsection


