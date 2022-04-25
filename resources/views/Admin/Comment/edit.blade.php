

@extends('Admin.Master.Master')
@section('title', 'Đăng ký khách hàng')
@section('content')
<link rel="stylesheet" href="css/style-comment.css">
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
                <!-- Bắc đầu khu vực tên của khách hàng -->
                    <div class="form-wrapper">
                        <select name="cus_id" class="form-control">
                            <option value="" disabled selected>Chọn khách hàng</option>
                            @foreach ($custommers as $key => $item)
                                <option @if($item->id==$cus_id) selected @endif value="{{$item->id}}">{{$item->cus_name}}</option>
                            @endforeach
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('cus_id'))
                            <div class="lbl-email">{{ $errors->first('cus_id') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực tên của khách hàng -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực sản phẩm cần bình luận -->
                    <div class="form-wrapper">
                        <select name="prd_id" id="" class="form-control">
                            <option value="" disabled selected>Chọn sản phẩm</option>
                            @foreach ($products as $key => $items)
                                <option @if($items->id==$prd_id) selected @endif value="{{$items->id}}">{{$items->name}}</option>
                            @endforeach
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('prd_id'))
                            <div class="lbl-email ">{{ $errors->first('prd_id') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực sản phẩm cần bình luận -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu khu vực trạng thái hoạt động của comment -->
                    <div class="form-wrapper">
                        <select name="com_status" id="" class="form-control">
                            <option value="" disabled selected>Chọn trạng thái hoạt động</option>
                            <option @if($comments->com_status==0) selected @endif value="0">Tắt kích hoạt</option>
                            <option @if($comments->com_status==1) selected @endif value="1">Bật kích hoạt</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <p>
                            @if ($errors->has('com_status'))
                            <div class="lbl-email ">{{ $errors->first('com_status') }}</div>
                            @endif
                        </p>
                    </div>
                <!-- Kết thúc khu vực trạng thái hoạt động của comment -->
                {{-----------------------------------------------------------------------}}
                {{-- Bắt đầu nội dung bình luận --}}
                    <div class="form-wrapper">
                        <label style="margin-top:5px;">Mô tả sản phẩm</label>
                        <br>
                        <textarea id="description" name="com_detail" cols="45"  rows="10">{{$comments->com_detail}}</textarea>
                        <p>
                            @if ($errors->has('com_detail'))
                            <div style="margin-top:5px;" class="lbl-email">{{ $errors->first('com_detail') }}</div>
                            @endif
                        </p>
                    </div>
                {{-- Kết thúc nội dùng bình luận --}}
                {{-----------------------------------------------------------------------}}
                <div class="form-wrapper">
                    <input type="submit" class="btn btn-info" value="Cập nhật" class="form-control">
                </div>
            </form>
            {{-- <div style="margin-top:80px" class="image-holder">
                <img src="img/comment.png" alt="">
            </div>
            <div>

            </div> --}}
        </div>
    </div>
@endsection




