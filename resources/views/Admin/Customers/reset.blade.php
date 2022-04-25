@extends('Admin.Master.Master')
@section('title', 'Khôi phục mật khẩu')
@section('content')
<link rel="stylesheet" href="css/style-reset.css">
<div class="wrapper">
    <div class="inner">
        <form action="" method="post">
            @csrf
            <!-- Tiêu đề -->
                <h3><strong>KHÔI PHỤC MẬT KHẨU</strong></h3>
                @if (session('thongbao'))
                    <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
                @endif
            <!-- Lấy dữ liệu vào form -->
                <div class="form-wrapper">                
                    @if(isset($customers))
                        <input type="text" name="cus_email" value="{{$customers->cus_email}}" class="form-control">
                    @else
                        <input type="text" name="cus_email" value="" class="form-control">
                    @endif

                    <i class="zmdi zmdi-email"></i>
                    <p>
                        @if ($errors->has('cus_email'))
                        <div class="lbl-email">{{ $errors->first('cus_email') }}</div>
                        @endif
                    </p>
                </div>            
            <!-- Nút submit -->
                <div class="form-wrapper">
                    <input type="submit" class="btn btn-primary" value="Khôi phục mật khẩu" class="form-control">
                </div>
        </form>
        <div class="image-holder">            
            @if(isset($users))
                @if($users -> status == 0)
                    <img style="width:100px;height:100px" src="img/unlock.jpg" alt="">
                @else
                    <img style="width:100px;height:100px" src="img/lock.jpg" alt="">
                @endif
            @else
                <img src="img/unlock.jpg" alt="">
            @endif

        </div>
    </div>
</div>
@endsection


