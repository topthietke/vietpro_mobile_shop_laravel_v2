@extends('Admin.Master.Master')
@section('title', 'Danh sách bình luận sản phẩm')
@section('content')
<link rel="stylesheet" href="css/style-comment.css">
        <div id="toolbar" class="btn-group">
            <a style="margin-left:5px;border-top-right-radius:3px;border-bottom-right-radius:3px;" href="{{route('Comment.Add')}}" class="btn btn-info">
                <i class="glyphicon glyphicon-plus"></i> Thêm mới
            </a>
            <a style="margin-left:5px;border-top-left-radius:3px;border-bottom-left-radius:3px;" href="{{route('Comment.Import')}}" class="btn btn-info">
                <i class="glyphicon glyphicon-file"></i> Chèn danh sách
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table data-toolbar="#toolbar"  data-toggle="table">
						    <thead>
                                <tr >
                                    <th class="text-center" data-field="STT" data-sortable="true"><strong>STT</strong></th>
                                    <th class="text-center" data-field="prd_name"  data-sortable="true"><strong>Sản phẩm</strong></th>
                                    <th class="text-center" data-field="cus_name" data-sortable="true"><strong>Người bình luận</strong></th>
                                    <th class="text-center"><strong>Thời gian</strong></th>
                                    <th class="text-center"><strong>Nội dung</strong></th>
                                    <th class="text-center"><strong>Trạng thái</strong></th>
                                    <th class="text-center"><strong>Hành động</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $key => $item)
                                <tr>
                                    <td id="col1"><p style="padding-top:45px;">{{ $comments->firstItem() + $key }}</p></td>
                                    <td id="col2">
                                        <div class="row">
                                            <div class="col-md-4"><img src="img/Products/{{$item->Products->image}}" alt="Áo đẹp" style="width:120px;height=130px;margin-bottom:0px;border:0px;"  class="thumbnail"></div>
                                            <div class="col-md-8 ">
                                                <p class="text-left" style="margin-bottom:4px"><strong>Tên sản phẩm:</strong> {{ $item->Products->name }}</p>
                                                <p class="text-left" style="margin-bottom:4px"><strong>Ký hiệu:</strong> {{ $item->Products->code }}</p>
                                                <p class="text-left" style="margin-bottom:4px"><strong>Bảo hành:</strong> {{ $item->Products->warrnty }} tháng</p>
                                                <p class="text-left" style="margin-bottom:4px"><strong>Tình trạng:</strong> {{ $item->Products->new }}</p>
                                                <p class="text-left" style="margin-bottom:4px"><strong style="color:red">Khuyến mãi:</strong> {{ $item->Products->promotion }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td id="col3">
                                        <p style="margin-top:20px;" > <strong>Họ tên:</strong> {{ $item->Customers->cus_name }}</p>
                                        <p><strong>Email:</strong> {{ $item->Customers->cus_email }}</p>
                                        <p><strong>Địa chỉ:</strong> {{ $item->Customers->cus_address }}</p>
                                        <p><strong>Số điện thoại:</strong> {{ $item->Customers->cus_phone }}</p>
                                    </td>
                                    <td id="col4" class="text-center"><p style="padding-top:45px;">{{$item->created_at}}</p></td>
                                    <td id="col5" class="left"><p style="padding-top:45px;">{!!$item->com_detail!!}</p></td>
                                    <td id="col6" class="text-left">
                                        @if($item->com_status==0)
                                            <h6 style="font-size:13px;color:red;padding-top:46px;">Tắt kích hoạt</h6>
                                        @else
                                            <h6 style="font-size:14px;color:blue;padding-top:46px;">Đang kích hoạt</h6>
                                        @endif

                                    </td>
                                    <td id="col7" >
                                        <a style="margin-top:40px;" style="" href="{{ route('Comment.Edit',['id'=>$item->id])}}"  class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>  Sửa</a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận');" style="margin-top:40px;" href="{{ route('Comment.Delete',['id'=>$item->id])}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>  Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{$comments->links()}}
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->

@endsection
