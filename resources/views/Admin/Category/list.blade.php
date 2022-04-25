@extends('Admin.Master.Master')
@section('title', 'Danh mục')
@section('content')
<link rel="stylesheet" href="css/styles.css">
		<div id="toolbar" class="btn-group">
			@if (session('thongbao'))
				<div class="lbl-email"><h4 class="alert alert-success">{{ session('thongbao')}}</h4></div>
			@endif
			<a style="margin-left:5px;border-top-right-radius:3px;border-bottom-right-radius:3px;" href="{{route('Category.Add')}}" class="btn btn-info">
				<i class="glyphicon glyphicon-plus"></i> Thêm mới
			</a>               
			<a style="margin-left:5px;border-top-left-radius:3px;border-bottom-left-radius:3px;" href="{{route('Category.Import')}}" class="btn btn-info">
				<i class="glyphicon glyphicon-file"></i> Chèn danh sách
			</a>
        </div>

		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table
									data-toolbar="#toolbar"
									data-toggle="table">

									<thead>
									<tr>
										<th data-field="id" data-sortable="true"><strong>ID</strong></th>
										<th><strong>Tên danh mục<strong></th>
										<th><strong>Hành động</strong></th>
									</tr>
									</thead>
									<tbody>
                                        @foreach($Categories as $key => $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td class="form-group">
                                                    <a href="{{route('Category.Edit', ['id' => $item->id])}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản {{$item->name}}');" href="{{route('Category.Delete', ['id' => $item->id])}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
                                        {{$Categories->links()}}
									</ul>
								</nav>
							</div>
					</div>
			</div>
		</div><!--/.row-->
	
@endsection
