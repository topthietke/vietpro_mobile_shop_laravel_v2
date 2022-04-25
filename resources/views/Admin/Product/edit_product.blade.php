<!-- STYLE CSS -->

@extends('Admin.Master.Master')
@section('title', 'Cập nhật sản phẩm')
@section('content')

<link rel="stylesheet" href="css/style-product.css">

<div class="wrapper">
    <div class="inner">
        <div class="container">
            <div class="row">
                <h3>
                    <strong> CẬP NHẬT THÔNG TIN SẢN PHẨM </strong>
                </h3>
                @if (session('thongbao'))
                <div ><h4 class="text-danger">{{ session('thongbao')}}</h4></div>
                @endif
                <form action="{{route('Product.Update',['id'=>$products->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{------------------------------------------------------------------------------}}
                    {{---- bắt đầu cột 1 ----}}
                        <div class="col-lg-6">
                            <!-- Cột 1 - Cột trái -->
                            {{-----------------------------------------------------------------------}}
                            {{-- Danh mục  --}}
                                <div class="form-wrapper">
                                    <label>Danh mục:</label>
                                    <select name="cat_name" class="form-control">
                                        @foreach($categories as $key => $item)
                                            <option @if ($item->id==$cat_id) selected @endif value="{{$item->id}}">{{$item -> name}}</option>
                                        @endforeach
                                    </select>
                                    <i class="zmdi zmdi-caret-down" style="font-size: 25px;margin-top:30px;"></i>
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
                                    <label>Tên sản phẩm:</label>
                                    <input type="text" name="prd_name" value="{{$products->name}}" class="form-control">
                                        @if ($errors->has('prd_name'))
                                            <div class="lbl-email">{{ $errors->first('prd_name') }}</div>
                                        @endif
                                </div>
                            {{-- Kết thúc tên sản pham --}}
                            {{-----------------------------------------------------------------------}}
                            {{-- Mã sản phẩm --}}
                                <div class="form-wrapper">
                                    <label>Mã sản phẩm:</label>
                                    <input type="text" name="prd_code" value="{{$products->code}}" class="form-control">
                                        @if ($errors->has('prd_code'))
                                            <div class="lbl-email">{{ $errors->first('prd_code') }}</div>
                                        @endif
                                </div>
                            {{-- Kết thúc tên sản phẩm --}}
                            {{-----------------------------------------------------------------------}}
                            {{-- Giá sản phẩm  --}}
                                <div class="form-wrapper">
                                    <label>Giá sản phẩm:</label>
                                    <input type="number" name="prd_price" value="{{(int)number_format($products->price,0,'','')}}" class="form-control">
                                    <p>
                                        @if ($errors->has('prd_price'))
                                        <div class="lbl-email">{{ $errors->first('prd_price') }}</div>
                                        @endif
                                    </p>
                                </div>
                            {{-- Kết thúc giá sản phẩm  --}}
                            {{-----------------------------------------------------------------------}}
                            {{-- Bảo hành  --}}
                                <div class="form-wrapper">
                                    <label>Thời gian bảo hành:</label>
                                    <input type="text" name="prd_warranty" value="{{$products->warrnty}}" class="form-control">

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
                                    <label>Phụ kiện:</label>
                                    <input type="text" name="prd_accessories" value="{{$products->accessories}}" class="form-control">
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
                                    <label>Khuyến mãi:</label>
                                    <input type="text" name="prd_promotion" value="{{$products->promotion}}" class="form-control">
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
                                    <label>Tình trạng:</label>
                                    <input type="text" name="prd_new"  value="{{$products->new}}" class="form-control">
                                    <p>
                                        @if ($errors->has('prd_new'))
                                        <div class="lbl-email">{{ $errors->first('prd_new') }}</div>
                                        @endif
                                    </p>
                                </div>
                            {{-- Kết thúc tình trạng (mới hay cũ bao nhiêu %)  --}}
                            {{-----------------------------------------------------------------------}}
                        </div>
                    {{---- kết thúc cột 1 ----}}
                    {{------------------------------------------------------------------------------}}
                    {{--  Bắt đầu Cột 2 ----}}
                        <div class="col-lg-6">
                            {{-----------------------------------------------------------------------}}
                            {{--  Ảnh sản phẩm --}}
                                <div class="form-wrapper">
                                    <label>Ảnh sản phẩm</label>
                                    <input name="prd_image" type="file" style="margin-top:5px;">
                                    <p>
                                        @if ($errors->has('prd_image'))
                                            <div  style="margin-top:5px;" class="lbl-email">{{ $errors->first('prd_image') }}</div>
                                        @else
                                            <br>
                                        @endif
                                    </p>
                                    <div>
                                        <img style="width:180px;height:200px;" src="img/Products/{{$products->image}}">
                                    </div>

                                </div>
                            {{--  Kết thúc ảnh sản phẩm  --}}
                            {{-----------------------------------------------------------------------}}
                            {{--  Trạng thái  --}}
                                    <div class="form-wrapper">
                                        <label style="margin-top:5px;">Trạng thái:</label>
                                        <i class="zmdi zmdi-caret-down" style="font-size: 25px;margin-top:30px;"></i>
                                        <select name="prd_status" id="" class="form-control">
                                            <option @if ($products->status == 0) selected  @endif value="0">Hết hàng </option>
                                            <option @if ($products->status == 1) selected  @endif value="1">Còn hàng</option>
                                        </select>

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
                                            <input name="prd_featured" type="checkbox" @if ($products->featured == 0) unchecked @else checked @endif value=1>Nổi bật
                                        </label>
                                    </div>
                                </div>
                            {{--  Kết Sản phẩm nổi bật  --}}
                        </div>
                        <div class="col-lg-12" >
                            {{-----------------------------------------------------------------------}}
                            {{--  Mô tả chi tiết sản phẩm  --}}
                                <div class="form-wrapper">
                                    <label style="margin-top:5px;">Mô tả sản phẩm:</label>
                                    <br>
                                    <textarea id="description" name="prd_details" cols="45" style="color:black" rows="10">{{$products->details}}</textarea>
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
                                   <input type="submit" class="btn btn-info" value="Cập nhật" class="form-control">
                                </div>
                            {{-- Kết thúc Nút submit  --}}
                            {{-----------------------------------------------------------------------}}
                        </div>
                    {{--  Kết thúc cột 2  --}}
                    {{------------------------------------------------------------------------------}}
                </form>
            </div>
        </div>
    </div>
</div>
{{--  Đoạn script chạy định dạng font trong o textarea  --}}
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
{{--  <!-- kết thúc đoạn script chạy định dạng font trong o textarea -->  --}}
{{-----------------------------------------------------------------------}}
@endsection




