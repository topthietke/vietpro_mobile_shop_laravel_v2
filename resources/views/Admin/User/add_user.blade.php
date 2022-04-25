
<!-- STYLE CSS -->

@extends('Admin.Master.Master')
@section('title', 'Thêm thành viên')
@section('content')
<link rel="stylesheet" href="css/style-register.css">
    <div class="wrapper">
        <div class="inner">
            <form action="" method="post">
                @csrf
                {{--  Tiêu đề  --}}
                <h3>
                    <strong> ĐĂNG KÝ TÀI KHOẢN </strong>
                </h3>
                @if (session('thongbao'))
                     <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
                @endif
                {{--  Họ và tên --}}
                    <div class="form-wrapper">
                        <i class="zmdi zmdi-account"></i>
                        <input type="text" name="FullName" placeholder="Nhập họ và tên" class="form-control">
                            @if ($errors->has('FullName'))
                            <div class="text-danger lbl-email">{{ $errors->first('FullName') }}</div>
                            @endif
                    </div>

                {{--  Hòm thư  --}}
                <div class="form-wrapper">
                    <input type="text" name="Email" placeholder="Nhập địa chỉ hòm thư" class="form-control">
                    <i class="zmdi zmdi-email"></i>
                    <p>
                        @if ($errors->has('Email'))
                        <div class="text-danger lbl-email">{{ $errors->first('Email') }}</div>
                        @endif
                    </p>
                </div>

                {{--  Mật khẩu  --}}
                <div class="form-wrapper">
                    <input type="password" name="Password" placeholder="Nhập mật khẩu" class="form-control">
                    <i class="zmdi zmdi-lock"></i>
                    <p>
                        @if ($errors->has('Password'))
                        <div class="text-danger lbl-email">{{ $errors->first('Password') }}</div>
                        @endif
                    </p>
                </div>

                {{--  Nhắc lại mật khẩu --}}
                <div class="form-wrapper">
                    <input type="password" name="Re_Password" placeholder="Nhắc lại mật khẩu" class="form-control">
                    <i class="zmdi zmdi-lock"></i>
                    <p>
                        @if ($errors->has('Re_Password'))
                        <div class="text-danger lbl-email">{{ $errors->first('Re_Password') }}</div>
                        @endif
                    </p>

                </div>

                {{--  Số điện thoại  --}}
                <div class="form-wrapper">
                    <input type="text" name="Phone" placeholder="Nhập số điện thoại" class="form-control">
                    <i class="zmdi zmdi-phone"></i>
                    <p>
                        @if ($errors->has('Phone'))
                        <div class="text-danger lbl-email">{{ $errors->first('Phone') }}</div>
                        @endif
                    </p>
                </div>

                {{--  Địa chỉ  --}}
                <div class="form-wrapper">
                    <input type="text" name="Address" placeholder="Nhập địa chỉ" class="form-control">
                    <i class="zmdi zmdi-home"></i>
                    <p>
                        @if ($errors->has('Address'))
                        <div class="text-danger lbl-email">{{ $errors->first('Address') }}</div>
                        @endif
                    </p>
                </div>

                {{--  Giới tính  --}}
                    <div class="form-wrapper">
                        <select name="Gender" id="" class="form-control">
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('Gender'))
                            <div class="text-danger lbl-email">{{ $errors->first('Gender') }}</div>
                            @endif
                        </p>
                    </div>

                {{--  Phân quyền  --}}
                <div class="form-wrapper">
                    <select name="level" id="" class="form-control">
                        <option value="" disabled selected>Chọn phân quyền</option>
                        <option value="Quản trị">Quản trị</option>
                        <option value="Người dùng">Người dùng</option>
                    </select>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    <p>
                        @if ($errors->has('level'))
                        <div class="text-danger lbl-email">{{ $errors->first('level') }}</div>
                        @endif
                    </p>
                </div>

                {{--  Nút submit  --}}
                <div class="form-wrapper">
                    <input type="submit" class="btn btn-primary" value="Đăng ký" class="form-control">
                </div>
            </form>
            <div class="image-holder">
                <img src="img/registration-form-1.jpg" alt="">
            </div>
        </div>
    </div>
@endsection


