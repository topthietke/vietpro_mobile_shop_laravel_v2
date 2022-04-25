
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
                            <form role="form" method="post">
                                @csrf
                            <div class="form-group">
                                  <input type="text" name="cat_name" value="{{$Categories->name}}" class="form-control name" placeholder="Nhập tên danh mục">
                            </div>
                            <p>
                                @if ($errors->has('cat_name'))
                                <div class="lbl-email">{{ $errors->first('cat_name') }}</div>
                                @endif
                            </p>
                            <div class="sbm">
                                <input type="submit" value="Cập nhật" name="sbm" class="btn btn-info">

                            </div>
                        </div>
                    	</form>
                    </div>
                </div>
        </div><!-- /.row-->
@endsection
