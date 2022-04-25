@extends('Admin.Master.Master')
@section('title', 'Chèn danh sách từ file Excel/CSV')
@section('content')
<link rel="stylesheet" href="css/style-reset.css">
<div class="wrapper">       
    <div class="inner">
         <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Tiêu đề -->
            <h3><strong>CẬP NHẬT DANH SÁCH TỪ FILE EXCEL / CSV</strong></h3>
            <!-- Thông báo  -->
            @if (session('thongbao'))
                 <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
            @endif
            {{--  Hòm thư  --}}
            <div class="form-wrapper">              
                <input type="file" name="file" value="" class="form-control">             
                <i class="zmdi zmdi-file"></i>
                <p>
                    @if ($errors->has('email'))
                    <div class="lbl-email">{{ $errors->first('email') }}</div>
                    @endif
                </p>
                <input type="submit" class="btn btn-primary" value="Chèn danh sách" class="form-control">
                <a class="btn btn-warning" href="{{ route('Customers.Export') }}">Xuất danh sách</a>
            </div>    
        </form>
        <div class="image-holder">            
                <img src="img/list.png" alt="">   

        </div>
    </div>
</div>
@endsection


