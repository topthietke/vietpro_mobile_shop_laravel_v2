@extends('Admin.Master.Master')
@section('title', 'Danh sách sản phẩm')
@section('content')
<link rel="stylesheet" href="css/styles.css">

		<div id="toolbar" class="btn-group">
            @if (session('thongbao'))
                <div ><h4 class="alert alert-success">{{ session('thongbao')}}</h4></div>
            @endif
                <a style="margin-left:5px;border-top-right-radius:3px;border-bottom-right-radius:3px;" href="{{route('Product.Add')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-plus"></i> Thêm mới
                </a>
                <a style="margin-left:5px;border-top-left-radius:3px;border-bottom-left-radius:3px;" href="{{route('Product.Import')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-file"></i> Chèn danh sách
                </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true"><strong>STT</strong></th>
						        <th data-field="name"  data-sortable="true"><strong>Thông tin sản phẩm</strong></th>
                                <th data-field="price" data-sortable="true"><strong>Giá sản phẩm</strong></th>
                                <th><strong>Trạng thái</strong></th>
                                <th><strong>Danh mục</strong></th>
                                <th><strong>Hành động</strong></th>
						    </tr>
                            </thead>
                                <tbody>
                                    @foreach($products as $key => $item)

                                        <tr>
                                            <td>{{ $products->firstItem() + $key }}</td>
                                            <td>
                                                <div class="row">
                                                        <div class="col-md-4"><img src="img/Products/{{$item->image}}" alt="Áo đẹp" width="180px" height="200px" class="thumbnail"></div>
                                                        <div class="col-md-8">
                                                            <p><strong>Tên sản phẩm:</strong> {{ $item->name }}</p>
                                                            <p><strong>Ký hiệu:</strong> {{ $item->code }}</p>
                                                            <p><strong>Bảo hành:</strong> {{ $item->warrnty }} tháng</p>
                                                            <p><strong>Tình trạng:</strong> {{ $item->new }}</p>
                                                            <p><strong style="color:red">Khuyến mãi:</strong> {{ $item->promotion }}</p>

                                                        </div>
                                                </div>
                                            </td>
                                            <td>{{number_format($item->price, 0) }} vnđ</td>
                                            <td>
                                                    @if($item->status==0)
                                                        <span class="label label-danger">
                                                            Hết hàng
                                                        </span>
                                                    @else
                                                        <span class="label label-success">
                                                            Còn hàng
                                                        </span>
                                                    @endif
                                            </td>
                                            <td>
                                                {{ $item->Categories->name }}
                                            </td>
                                            <td class="form-group">
                                                <a href="{{ route('Product.Edit',['id'=>$item->id])}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản {{$item->name}}');" href="{{ route('Product.Delete',['id'=>$item->id])}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Xóa</a>
                                            </td>
                                        </tr>

                                    @endforeach
                             </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{$products -> links()}}
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->

@endsection
