@extends('Admin.Master.Master')
@section('title', 'Danh sách khách hàng')
@section('content')
<link rel="stylesheet" href="css/styles.css">
    <!-- {{-- main --}} -->
        <div id="toolbar" class="btn-group">            
                <a style="margin-left:5px;border-top-right-radius:3px;border-bottom-right-radius:3px;" href="{{route('Customers.Add')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-plus"></i> Thêm mới
                </a>               
                <a style="margin-left:5px;border-top-left-radius:3px;border-bottom-left-radius:3px;" href="{{route('Customers.Import')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-file"></i> Chèn danh sách
                </a>
        </div>
    <!-- Thông báo kết quả khi đăng ký tài khoản -->
        @if (session('thongbao'))
            <div ><h4 class="alert alert-success">{{ session('thongbao')}}</h4></div>
        @endif
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table
                            data-toolbar="#toolbar"
                            data-toggle="table">
						    <thead>
						    <tr>
						        <th data-sortable="true"><strong>STT</strong></th>
						        <th data-sortable="true"><strong>Họ và tên</strong></th>
                                <th data-sortable="true"><strong>Ngày sinh</strong></th>
                                <th data-sortable="true"><strong>Giới tính</strong></th>
                                <th data-sortable="true"><strong>Số điện thoại</strong></th>
                                <th data-sortable="true"><strong>Hòm thư</strong></th>
						        <th data-sortable="true"><strong>Địa chỉ</strong></th>
                                <th data-sortable="true"><strong>Thời gian</strong></th>
                                <th data-sortable="true"><strong>Xử lý</strong></th>
                                <th data-sortable="true"><strong>Trạng thái</strong></th>

						    </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $key => $item)
                                <tr>
                                    <td>{{ $customers->firstItem() + $key }}</td>
                                    <td>{{$item->cus_name}}</td>
                                    <td>{{date($item->cus_birthday)}}</td>
                                    <td>
                                        @if($item->cus_gender==0)
                                        Nữ
                                        @else
                                        Nam
                                        @endif
                                        
                                    </td>                                        
                                    <td>{{$item->cus_phone}}</td>
                                    <td>{{$item->cus_email}}</td>
                                    <td>{{$item->cus_address}}</td>                                   
                                    <td>{{$item->cus_join}}</td>      
                                    <td class="form-group">
                                        <a href="{{route('Customers.Edit', ['id' => $item->id])}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không');" href="{{route('Customers.Delete', ['id' => $item->id])}}" class="btn btn-danger" ><i class="glyphicon glyphicon-remove"></i></a>
                                        <a href="{{route('Customers.Reset', ['id' => $item->id])}}" class="btn btn-info"><i class="glyphicon glyphicon-lock"></i></a>
                                    </td>
                                    <td>
                                        @if($item->cus_status==0) Không hoạt động @else Đang hoạt động @endif
                                        
                                    </td>      
                                </tr>                                                            
                                @endforeach
                            </tbody>
                            
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                               {{$customers->links()}}
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->
    
   
@endsection