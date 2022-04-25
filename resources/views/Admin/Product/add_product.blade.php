
@extends('Admin.Master.Master')
@section('title', 'Thêm sản phẩm')
@section('content')

<link rel="stylesheet" href="css/style-product.css">

<div class="wrapper">
    <div class="inner">
    {{--  Phần này chia làm hai cột  --}}
        <div class="container">
            <div class="row">
                <form action="{{route('Product.Store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>
                        <strong> THÊM MỚI SẢN PHẨM </strong>
                    </h3>
                    @if (session('thongbao'))
                    <div ><h4 class="alert alert-success">{{ session('thongbao')}}</h4></div>
                    @endif
                        {{---- Cột 1 ----}}
                            <div class="col-lg-6">
                                <!-- Cột 1 - Cột trái -->
                                {{-----------------------------------------------------------------------}}
                                {{-- Danh mục  --}}
                                    <div class="form-wrapper">
                                        <select name="cat_name" class="form-control">
                                            <option value="" disabled selected>Chọn danh mục</option>
                                            @foreach($categories as $key => $item)
                                                    <option value="{{$item->id}}">{{$item -> name}}</option>
                                            @endforeach

                                        </select>
                                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                                        <p>
                                            @if ($errors->has('cat_name'))
                                            <div class="lbl-email">{{ $errors->first('cat_name') }}</div>
                                            @endif
                                        </p>
                                    </div>
                                {{-- Kết thúc danh mục --}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Ten san pham --}}
                                    <div class="form-wrapper">
                                        <input type="text" name="prd_name" placeholder="Nhập tên sản phẩm" class="form-control">
                                            @if ($errors->has('prd_name'))
                                                <div class="lbl-email">{{ $errors->first('prd_name') }}</div>
                                            @endif
                                    </div>
                                {{-- Kết thúc tên sản pham --}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Mã sản phẩm --}}
                                    <div class="form-wrapper">
                                        <input type="text" name="prd_code" placeholder="Nhập mã sản phẩm" class="form-control">
                                            @if ($errors->has('prd_code'))
                                                <div class="lbl-email">{{ $errors->first('prd_code') }}</div>
                                            @endif
                                    </div>
                                {{-- Kết thúc tên sản phẩm --}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Giá sản phẩm  --}}
                                    <div class="form-wrapper">
                                        <input type="number" name="prd_price" placeholder="Nhập giá sản phẩm" class="form-control">
                                        <p>
                                            @if ($errors->has('prd_price'))
                                            <div class="lbl-email">{{ $errors->first('prd_price') }}</div>
                                            @endif
                                        </p>
                                    </div>
                                {{-- Kết thúc giá sản phẩm  --}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Bắt đầu Bảo hành  --}}
                                    <div class="form-wrapper">
                                        <input type="text" name="prd_warranty" placeholder="Nhập thời gian bảo hành" class="form-control">

                                        <p>
                                            @if ($errors->has('prd_warranty'))
                                            <div class="lbl-email">{{ $errors->first('prd_warranty') }}</div>
                                            @endif
                                        </p>
                                    </div>
                                {{-- Kết thúc Bảo hành  --}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Phụ kiện của sản phẩm --}}
                                    <div class="form-wrapper">
                                        <input type="text" name="prd_accessories" placeholder="Nhập thông tin phụ kiện" class="form-control">
                                        <p>
                                            @if ($errors->has('prd_accessories'))
                                            <div class="lbl-email">{{ $errors->first('prd_accessories') }}</div>
                                            @endif
                                        </p>

                                    </div>
                                {{-- Kết thúc phụ kiện  --}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Khuyến mãi  --}}
                                    <div class="form-wrapper">
                                        <input type="text" name="prd_promotion" placeholder="Nhập khuyến mãi" class="form-control">
                                        <p>
                                            @if ($errors->has('prd_promotion'))
                                            <div class="lbl-email">{{ $errors->first('prd_promotion') }}</div>
                                            @endif
                                        </p>
                                    </div>
                                {{-- Kết thúc khuyến mãi--}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Tình trạng (mới hay cũ bao nhiêu %)  --}}
                                    <div class="form-wrapper">
                                        <input type="text" name="prd_new" placeholder="Nhập tình trạng" class="form-control">
                                        <p>
                                            @if ($errors->has('prd_new'))
                                            <div class="lbl-email">{{ $errors->first('prd_new') }}</div>
                                            @endif
                                        </p>
                                    </div>
                                {{-- Kết thúc tình trạng (mới hay cũ bao nhiêu %)  --}}
                                {{-----------------------------------------------------------------------}}
                            </div>
                        {{---- Cột 2 ----}}
                            <div class="col-lg-6">
                                {{-----------------------------------------------------------------------}}
                                {{--  Ảnh sản phẩm --}}
                                    <div class="form-wrapper">
                                            <label>Ảnh sản phẩm</label>
                                            <input name="prd_image" type="file" style="margin-top:5px;">
                                            <p>
                                                @if ($errors->has('prd_image'))
                                                    <div style="margin-top:5px;" class="lbl-email">{{ $errors->first('prd_image') }}</div>
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <div>
                                                <img src="img/download.jpeg">
                                            </div>

                                    </div>
                                {{--  Kết thúc ảnh sản phẩm  --}}
                                {{-----------------------------------------------------------------------}}
                                {{--  Trạng thái  --}}
                                        <div class="form-wrapper">
                                            <select name="prd_status" id="" class="form-control">
                                                <option value="" disabled selected>Chọn trạng thái cho sản phẩm</option>
                                                <option value="0">Hết hàng</option>
                                                <option value="1">Còn hàng</option>
                                            </select>
                                            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                                            <p>
                                                @if ($errors->has('prd_status'))
                                                <div class="lbl-email">{{ $errors->first('prd_status') }}</div>
                                                @endif
                                            </p>
                                        </div>
                                {{--  Kết thúc trạng thái --}}
                                {{-----------------------------------------------------------------------}}
                                {{--  Sản phẩm nổi bật  --}}
                                    <div class="form-wrapper">
                                        <label style="margin-top:5px;">Sản phẩm nổi bật</label>
                                        <div class="checkbox">
                                            <label>
                                                <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                            </label>
                                        </div>
                                    </div>
                                {{--  Kết Sản phẩm nổi bật  --}}
                            </div>
                        {{---- Hàng khác  --}}
                            <div class="col-lg-12" >
                                {{-----------------------------------------------------------------------}}
                                {{--  Mô tả chi tiết sản phẩm  --}}
                                    <div class="form-wrapper">
                                        <label style="margin-top:5px;">Mô tả sản phẩm</label>
                                        <br>
                                        <textarea id="description" name="prd_details" cols="45"  rows="10"></textarea>
                                        <p>
                                            @if ($errors->has('prd_details'))
                                            <div style="margin-top:5px;" class="lbl-email">{{ $errors->first('prd_details') }}</div>
                                            @endif
                                        </p>
                                    </div>
                                {{--  Kết thúc Mô tả chi tiết sản phẩm  --}}
                                {{-----------------------------------------------------------------------}}
                                {{-- Nút submit  --}}
                                    <div class="form-wrapper">
                                        <input type="submit" class="btn btn-info" value="Thêm mới" class="form-control">
                                        <input type="reset" class="btn btn-primary" value="Làm mới" class="form-control">
                                    </div>
                                {{-- Kết thúc Nút submit  --}}
                                {{-----------------------------------------------------------------------}}
                            </div>
                        {{-- Hết hàng khác --}}
                </form>
            </div>

        </div>
    </div>
</div>
// script
@endsection

