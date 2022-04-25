

@extends('Admin.Master.Master')
@section('title', 'Đăng ký khách hàng')
@section('content')
<link rel="stylesheet" href="css/style-comment.css">
    <div class="wrapper">
        <div class="inner">
            <form action="" method="POST">
            @csrf
                <!-------------------------------------------------------------------------------------------------------------->
                <!-- Bắt đầu hàng 1 - Tiêu đề -->
                    <div class="row">
                        <div class="header">
                            <h3 style="text-align:center;">
                                <strong> ĐĂNG KÝ KHÁCH HÀNG </strong>
                            </h3>
                            {{--  Tiêu đề  --}}
                            @if (session('thongbao'))
                                    <div ><h4 class="alert alert-success">{{ session('thongbao')}}</h4></div>
                            @endif
                        </div>
                    </div>
                <!-- Kết thúc hàng 1 - Tiêu đề -->
                <!---------------------------------------------------------------------------------------------->
                <!-- Bắt đầu hàng 2 - mục nhập dữ liệu -->
                    <div class="row">
                    <!-- Bắt đầu cột 1 - Khu vực nhập thông tin -->
                        <div class="col-lg-4 col-md-6 col-xm-12">
                        <!-- Bắc đầu khu vực tên của khách hàng -->
                            <div class="form-wrapper">
                                <select name="cus_id" class="form-control">
                                    <option value="" disabled selected>Chọn khách hàng</option>
                                    @foreach ($custommers as $key => $item)
                                        <option  value="{{$item->id}}">{{$item->cus_name}}</option>
                                    @endforeach
                                </select>
                                <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                                <p>
                                    @if ($errors->has('cus_id'))
                                    <div class="text-danger ">{{ $errors->first('cus_id') }}</div>
                                    @endif
                                </p>
                            </div>
                        <!-- Kết thúc khu vực tên của khách hàng -->
                        <!---------------------------------------------------------------------------------------------->
                        <!-- Bắt đầu khu vực sản phẩm cần bình luận -->
                            <div class="form-wrapper">
                                <select name="prd_id" class="form-control" onchange="HienThi(this)">
                                    <option value="" disabled selected>Chọn sản phẩm</option>
                                    @foreach ($products as $key => $prd)
                                        {{-- <option value="{{$items->id}}">{{$items->name}}</option> --}}
                                        <option value="{{$prd->id}}">{{$prd->name}}</option>
                                    @endforeach
                                </select>
                                <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                                <p>
                                    @if ($errors->has('prd_id'))
                                    <div class="text-danger ">{{ $errors->first('prd_id') }}</div>
                                    @endif
                                </p>
                            </div>
                        <!-- Kết thúc khu vực sản phẩm cần bình luận -->
                        <!---------------------------------------------------------------------------------------------->
                        <!-- Bắt đầu khu vực trạng thái hoạt động của comment -->
                            <div class="form-wrapper">
                                <select name="com_status" id="" class="form-control">
                                    <option value="" disabled selected>Chọn trạng thái hoạt động</option>
                                    <option value="0">Tắt kích hoạt</option>
                                    <option value="1">Bật kích hoạt</option>
                                </select>
                                <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                                <p>
                                    @if ($errors->has('com_status'))
                                    <div class="text-danger ">{{ $errors->first('com_status') }}</div>
                                    @endif
                                </p>
                            </div>
                        <!-- Kết thúc khu vực trạng thái hoạt động của comment -->
                        <!---------------------------------------------------------------------------------------------->
                        </div>
                    <!-- Kết thúc cột 1 - Khu vực nhập thông tin -->
                    <!--------------------------------------------->
                    <!-- Bắt đầu cột 2 - Khu vực hiển thị thông tin -->
                        <div class="col-lg-8 col-md-6 col-xm-12">
                        <!----  Ảnh sản phẩm -->
                                <div class="form-wrapper">
                                    <div class="form-wrapper">
                                        <div class="col-md-4 margin:0px"><img src="img/Products/show_images" alt="Áo đẹp" width="100px" height="150px" class="thumbnail"></div>
                                        <div class="col-md-8  margin:0px">
                                            <p><strong>Ký hiệu: &nbsp;</strong><span id="show_code"></span></p>
                                            <p><strong>Bảo hành: &nbsp;</strong> <span id="show_warrnty"> </span> tháng</p>
                                            <p><strong>Tình trạng: &nbsp;</strong><span id="show_new"></p>
                                            <p><strong>Trạng thái: &nbsp;</strong><span id="show_status"></p>
                                            <p><strong style="color:red">Khuyến mãi: &nbsp;</strong><span id="show_promotion"></p>
                                        </div>

                                </div>
                        <!----  Kết thúc ảnh sản phẩm  -->
                        </div>
                    <!-- Kết thúc cột 2 - Khu vực hiển thị thông tin -->
                    </div>
                <!-- Kết thúc hàng 2 - mục nhập dữ liệu-->
                <!-------------------------------------------------------------------------------------------------------------->
                <!-- Bắt đầu hàng 3 - Nhập nội dung bình luận-->
                    <div class="row">
                        <div class="col-lg-12">
                        <!---- Bắt đầu nội dung bình luận -->
                                <div class="form-wrapper">
                                    <label style="margin-top:5px;">Mô tả sản phẩm</label>
                                    <br>
                                    <textarea id="description" name="com_detail" cols="45"  rows="10"></textarea>
                                    <p>
                                        @if ($errors->has('com_detail'))
                                        <div style="margin-top:5px;" class="lbl-email">{{ $errors->first('com_detail') }}</div>
                                        @endif
                                    </p>
                                </div>
                        <!---- Kết thúc nội dùng bình luận -->
                        <!---- Bắt đầu nút submit -->
                            <div class="form-wrapper">
                                <input type="submit" class="btn btn-info" value="Đăng ký thông tin" class="form-control">
                            </div>
                        <!---- Kết thúc nút submit -->
                        </div>
                    </div>
                <!-- Kết thúc hàng 3 - Nhập nội dung bình luận -->
                <!-------------------------------------------------------------------------------------------------------------->


            </form>
        </div>
    </div>
    <script>
        // Hàm xử lý khi thẻ select thay đổi giá trị được chọn
        // obj là tham số truyền vào và cũng chính là thẻ select
        function HienThi(obj)
        {
            var message = document.getElementById('show_code');
            message.innerHTML = "{{$prd->code}}";
            var message = document.getElementById('show_promotion');
            message.innerHTML = "{{$prd->promotion}}";
            var message = document.getElementById('show_new');
            message.innerHTML = "{{$prd->new}}";
            var message = document.getElementById('show_status');
            if("$prd->status"==0){
                message.innerHTML = "Hết hàng";
            }
            else{
                message.innerHTML = "Còn hàng";
            }
            var message = document.getElementById('show_warrnty');
            message.innerHTML = "{{$prd->warrnty}}";

        }
    </script>
@endsection
