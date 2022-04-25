<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Mobile Shop / @yield('title')</title>
<base href="{{ asset('').'Admin/' }}">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> -->
<script src="js/ckeditor.js"></script>
<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">



</head>
<body >
<!------------------------------------------------------------------------------------->
<!-- Khu vực header -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				@include('Admin.Master.header')
			</div>
		</div><!-- /.container-fluid -->
	</nav>
<!-- Kết thúc khu vực hearder -->
<!------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------->
<!-- Khu vực menu trái (sidebar)	 -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{route('Admin.dashboard')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="{{route('User.List')}}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="{{route('Category.List')}}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li><a href="{{route('Product.List')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
            <li><a href="{{route('Orders.List')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý đơn hàng</a></li>
            <li><a href="{{route('Product.List')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý chi tiết đơn hàng</a></li>
			<li><a href="{{route('Customers.List')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-female-user"></use></svg>Quản lý khách hàng</a></li>
			<li><a href="{{route('Comment.List')}}"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
			<li><a href="{{route('Ads.List')}}"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
			<li><a href="{{route('Mail.Config')}}"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>
	</div>
<!-- Kết thúc Khu vực menu trái (sidebar)	 -->
<!------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------->
<!-- Khu vực nội dung dashboard	 -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main mr-2"  >
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="{{route('Admin.dashboard')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">@yield('title')</li>
                </ol>
            </div>
            <!--/.row-->
            <div class="row">
                @yield('content')
            </div>
	</div>
<!-- Kết thúc Khu vực menu trái sidebar	 -->
{{-----------------------------------------------------------------------------------------}}
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>

    {{--  Đoạn script chọn thêm từng danh mục hay thêm theo danh sách  --}}
{{-----------------------------------------------------------------------------------------}}
    <script>
        function myFunction() {
          var checkBox = document.getElementById("myCheck");
          var single = document.getElementById("single");
          var multi = document.getElementById("multi");
          if (checkBox.checked == true){
                multi.style.display = "block";
                single.style.display = "none";
          } else {
                single.style.display = "block";
                multi.style.display = "none";
          }
        }
    </script>
{{-----------------------------------------------------------------------------------------}}
</body>

</html>
{{-----------------------------------------------------------------------------}}
{{-- Đoạn script chạy định dạng font trong o textarea --}}
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
        function genderChanged(obj)
    {
        var message = document.getElementById('show_message');
        var value = obj.value;
        if (value === ''){
            message.innerHTML = "Bạn chưa chọn giới tính";
        }
        else if (value === 'nam'){
            message.innerHTML = "Bạn đã chọn giới tính nam";
        }
        else if (value === 'nu'){
            message.innerHTML = "Bạn đã chọn giới tính nữ";
        }
    }
</script>

{{-- Kết thúc đoạn script chạy định dạng font trong o textarea --}}
{{---------------------------------------------------------------------------}}
