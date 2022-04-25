
<!-- STYLE CSS -->

@extends('Admin.Master.Master')
@section('title', 'Thêm danh mục')
@section('content')
<link rel="stylesheet" href="css/style-category.css">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                        <form action="" method="post">
                        @csrf
                            <div class="form-group">
                                  <input type="text" name="cat_name" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            @if (session('thongbao'))
                            <div class="lbl-email">{{ session('thongbao')}}</div>
                            @endif
                            @if ($errors->has('cat_name'))
                            <div class="lbl-email">{{ $errors->first('cat_name') }}</div>
                            @endif
                            <div class="sbm">
                                <input type="submit" value="Thêm mới" name="sbm" class="btn btn-info">
                            <input type="reset" value="Làm mới"name="sbm" class="btn btn-danger" >
                          </div>
                        </div>
                    	</form>
                    </div>
                </div>
        </div><!-- /.row-->
@endsection
