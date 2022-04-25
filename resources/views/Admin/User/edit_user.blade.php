@extends('Admin.Master.Master')
@section('title', 'Sửa thành viên')
@section('content')
<link rel="stylesheet" href="css/style-edit.css">
    <div class="wrapper">
        <div class="inner">
            <form action="" method="post">
                @csrf
                {{--  Tiêu đề  --}}
                    <h3>
                        <strong> CẬP NHẬT TÀI KHOẢN </strong>
                    </h3>
                    @if (session('thongbao'))
                        <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
                    @endif
                {{--  Họ và tên --}}
                    <div class="form-wrapper">
                        <i class="zmdi zmdi-account"></i>
                        <input type="text" name="FullName" value="{{$users ->full}}" class="form-control">
                        @if ($errors->has('FullName'))
                        <div class="text-danger lbl-email">{{ $errors->first('FullName') }}</div>
                        @endif
                    </div>

                {{--  Hòm thư  --}}
                    <div class="form-wrapper">
                        <input type="text" name="Email" value="{{ $users ->email}}" class="form-control">
                        <i class="zmdi zmdi-email"></i>
                        <p>
                            @if ($errors->has('Email'))
                            <div class="text-danger lbl-email">{{ $errors->first('Email') }}</div>
                            @endif
                        </p>
                    </div>


                {{--  Số điện thoại  --}}
                    <div class="form-wrapper">
                        <input type="text" name="Phone" value="{{ $users ->phone}}" class="form-control">
                        <i class="zmdi zmdi-phone"></i>
                        <p>
                            @if ($errors->has('Re_Password'))
                            <div class="text-danger lbl-email">{{ $errors->first('Re_Password') }}</div>
                            @endif
                        </p>
                    </div>

                {{--  Địa chỉ  --}}
                    <div class="form-wrapper">
                        <input type="text" name="Address" value="{{ $users ->address}}" class="form-control">
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
                            <option @if($users->gender==0) selected @endif  value="0">Nam</option>
                            <option @if($users->gender==1) selected @endif  value="1">Nữ</option>
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
                            <option @if($users->level==0) selected @endif value="0">Quản trị</option>
                            <option @if($users->level==1) selected @endif  value="1">Người dùng</option>
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
                    <input type="submit" class="btn btn-primary" value="Cập nhật" class="form-control">
                </div>
            </form>
            <div class="image-holder">
                <img src="img/registration-form-1.jpg" alt="">
            </div>
        </div>
    </div>
@endsection


