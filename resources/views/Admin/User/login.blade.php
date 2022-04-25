<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Đăng nhập hệ thống</title>
        <base href="{{ asset('').'Admin/' }}">
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

            <div class="inner">
                    <form action="" method="post">
                        @csrf
                        {{--  Tiêu đề  --}}
                        <h3>
                            <strong>ĐĂNG NHẬP HỆ THỐNG</strong>
                        </h3>
                        @if (session('thongbao'))
                            <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
                        @endif

                        {{--  Account  --}}
                        <div class="form-wrapper">
                            <input class="form-control" type="text" Name="email" placeholder="Nhập địa chỉ email">
                            <i class="zmdi zmdi-email"></i>
                            <p>
                                @if ($errors->has('email'))
                                <div class="lbl-email">{{ $errors->first('email') }}</div>
                                @endif
                            </p>
                        </div>

                        {{--  Password  --}}
                        <div class="form-wrapper">
                            <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu">
                            <i class="zmdi zmdi-lock"></i>
                            <p>
                                @if ($errors->has('password'))
                                <div class="lbl-email">{{ $errors->first('password') }}</div>
                                @endif
                            </p>
                        </div>
                        {{--  Nút submit  --}}
                        <div class="form-wrapper">
                            <input type="submit" class="btn btn-primary" value="Đăng nhập">
                            <a href="{{route('Admin.Forgot')}}" class="btn btn-primary" >Quên mật khẩu</a>
                        </div>
                    </form>
                    <div class="image-holder">
                        <img src="img/login.jpg" alt="">
                        <a href="{{Route('Admin.Facebook')}}" ><img src="img/fb-login.png"></a>
                        <br><br>
                        <a href="{{route('Admin.Google')}}" ><img src="img/google-login.png"></a>
                    </div>
                    <!-- Đăng nhập tài khoản fb, google -->

                    <div>
                </div>
            </div>



    </body>
</html>
