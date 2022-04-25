@extends('Admin.Master.Master')
@section('title', 'Khôi phục mật khẩu')
@section('content')
<link rel="stylesheet" href="css/style-reset.css">
<div class="wrapper">
    <div class="inner">
        <form action="" method="post">
            @csrf
            {{--  Tiêu đề  --}}
            <h3>
                <strong>KHÔI PHỤC MẬT KHẨU</strong>
            </h3>
            @if (session('thongbao'))
                 <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
            @endif
            {{--  Hòm thư  --}}
            <div class="form-wrapper">
                @if(isset($users))
                    <input type="text" name="email" value="{{ $users ->email}}" class="form-control">
                @else
                    <input type="text" name="email" value="" class="form-control">
                @endif

                <i class="zmdi zmdi-email"></i>
                <p>
                    @if ($errors->has('email'))
                    <div class="lbl-email">{{ $errors->first('email') }}</div>
                    @endif
                </p>
            </div>


            {{--  check box unlock  --}}
            <div class="form-wrapper">
                <input type="checkbox" name="chk">
                <lable>Mở khóa tài khoản</lable>
                <i class="zmdi zmdi-lock"></i>
            </div>

            {{--  Nút submit  --}}
            <div class="form-wrapper">
                <input type="submit" class="btn btn-primary" value="Khôi phục mật khẩu" class="form-control">
            </div>
        </form>
        <div class="image-holder">
            {{--  //Nếu tài khoản bị khóa sẽ hiển thị ảnh lock, còn tài khoản ở trạng thái bình thường sẽ ảnh unlock  --}}
            @if(isset($users))
                @if($users -> status == 0)
                    <img src="img/unlock.jpg" alt="">
                @else
                    <img src="img/lock.jpg" alt="">
                @endif
            @else
                <img src="img/unlock.jpg" alt="">
            @endif

        </div>
    </div>
</div>
@endsection


