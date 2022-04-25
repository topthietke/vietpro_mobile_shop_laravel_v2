<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Đăng nhập hệ thống</title>
        <base href="{{ asset('').'public/Admin/' }}">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>
        <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/style-reset.css">
    </head>
    <body style="background-image: url('img/bg-login.jpg');">

        <div class="wrapper">
            <div class="inner">
                <form action="" method="post">
                    @csrf
                    {{--  Tiêu đề  --}}
                    <h3>
                        <strong>KHÔI PHỤC MẬT KHẨU</strong>
                    </h3>
                    @if (session('thongbao'))
                         <div class="lbl-email">{{ session('thongbao')}}</div>
                    @endif
                    {{--  Hòm thư  --}}
                    <div class="form-wrapper">
                        <input type="text" name="email" placeholder="Nhập địa chỉ email" class="form-control">
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
                        <a class="btn btn-primary" href="{{route('Admin.Login')}}">Đăng nhập</a>
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
    </body>
</html>
