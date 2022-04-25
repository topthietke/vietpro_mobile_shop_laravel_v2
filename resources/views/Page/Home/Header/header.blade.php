<!--	Header	-->
<div id="header">
	<div class="container">
    	<div class="row">
            {{--  Hiển thị logo  --}}
             @include('Page.Home.Header.logo')
            {{--  //Kết thúc hiển thị logo  --}}

            {{--  Khu vực tìm kiểm sản phẩm  --}}
            @include('Page.Home.Header.search')
            {{--  Kết thúc khu vực tìm kiếm  --}}

            {{--  Khu vực giỏ hàng  --}}
            @include('Page.Home.Header.cart')
            {{--  Kết thúc khu vực giỏ hàng  --}}
        </div>
    </div>

</div>
<!--	End Header	-->
