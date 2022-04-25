@extends('Admin.Master.Master')
@section('title', 'Danh mục thành viên')
@section('content')
<link rel="stylesheet" href="css/styles.css">

    <!-- {{-- main --}} -->
        <div id="toolbar" class="btn-group">            
                <a style="margin-left:5px;border-top-right-radius:3px;border-bottom-right-radius:3px;" href="{{route('User.Add')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-plus"></i> Thêm mới
                </a>               
                <a style="margin-left:5px;border-top-left-radius:3px;border-bottom-left-radius:3px;" href="{{route('User.Import')}}" class="btn btn-info">
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
						        <th data-field="id" data-sortable="true"><strong>STT</strong></th>
						        <th data-field="name"  data-sortable="true"><strong>Họ và tên</strong></th>
                                <th data-field="price" data-sortable="true"><strong>Email</strong></th>
                                <th><strong>Quyền</strong></th>
                                <th><strong>Hành động</strong></th>
						    </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $key }}</td>
                                    <td>{{$user->full}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->level==0)
                                        <span class="label label-primary">Quản trị </span>
                                        @else
                                        <span class="label label-danger">Người dùng </span>
                                        @endif
                                    </td>
                                    <td class="form-group">
                                        <a href="{{route('User.Edit', ['id' => $user->id])}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        &nbsp;&nbsp;<a href="{{route('User.Delete', ['id' => $user->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản {{$user->email}}');" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        &nbsp;&nbsp;<a href="{{route('User.Reset', ['id' => $user->id])}}" class="btn btn-info"><i class="glyphicon glyphicon-lock"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                               {{$users->links()}}
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->

    <!--/.main-->
@endsection
