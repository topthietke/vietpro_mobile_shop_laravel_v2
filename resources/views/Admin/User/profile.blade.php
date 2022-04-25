@extends('Admin.Master.Master')
@section('title', 'Thông tin người dùng')
@section('content')
<link rel="stylesheet" href="css/style-regsiter.css">
<div class="container">
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2"></div>
        <div class="col-xs-10 col-sm-10 col-md-8">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <img src="img/user.jpg" alt="" class="img-rounded img-responsive" width='220px' />
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <h3><strong>THÔNG TIN TÀI KHOẢN</strong></h3>
                        <div><h4><i class="glyphicon glyphicon-user"></i><strong>  Họ và tên: </strong> {{ $user->full }}</h4></div>
                        <div><h4><i class="glyphicon glyphicon-envelope"></i> <strong>Số điện thoại: </strong>{{ $user->phone }}</h4></div>
                        <div><h4><i class="glyphicon glyphicon-globe"></i><strong> Email: </strong>{{ $user->email }}</h4></h4></div>
                        <div><h4><i class="glyphicon glyphicon-map-marker"></i><strong> Địa chỉ: </strong>{{ $user->address }}</h4></h4></div>
                        <div><h4><i class="glyphicon glyphicon-gift"></i><strong>  Quyền: </strong> @if($user->level==1) Quản trị @else Người dùng @endif </h4></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
