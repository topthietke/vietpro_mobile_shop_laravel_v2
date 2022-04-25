<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Mobile Shop / @yield('title')</title>
<base href="{{ asset('').'Page/' }}">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>


{{-- Khu vực danh cho header--}}
    @include('Page.Home.Header.header')
{{--Kết thúc khu vực hearder--}}

{{-----------------------------------------------------------------------------------}}


<div class="container">
    {{--  Khu vực hàng 1 chứa menu  --}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @include('Page.Home.Menu.menu')
        </div>
    </div>
    {{-- Kết thúc Khu vực menu  --}}

    {{--  Khu vực hàng 2 chứa main trong main: -slide, sản phẩm và sidebar  --}}
    <div class="row">
        {{--  Khu vực nội dung chính của website  --}}

            <div id="main" class="col-lg-8 col-md-12 col-sm-12">
            {{--  Khu vực slide  --}}
                @include('Page.Home.Slide.slide')
            {{--  Kết thúc khu vực slide  --}}

            {{--  Khu vực sản phẩm nổi bật --}}
                @include('Page.Home.Feature.feature')
            {{--  Kết thúc khu vực sản phẩm nổi bật--}}

            {{--  Khu vực sản phẩm nổi bật --}}
                @include('Page.Home.Latest.latest')
            {{--  Kết thúc khu vực sản phẩm nổi bật--}}
            </div>
        {{--  Kết thúc khu vực nội dung chính của website  --}}


        {{--  Khu vực sidebar  --}}
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
                @include('Page.Home.Sidebar.sidebar')
            </div>
        {{-- Kết thúc khu vực sidebar  --}}

    </div>
    {{-- Kết thúc Khu vực menu  --}}
</div>
{{-----------------------------------------------------------------------------------}}
{{--Khu vực chính của website--}}

{{--  @yield('Main')  --}}

{{--Khu vực chính của website--}}


{{-----------------------------------------------------------------------------------}}




{{--Khu vực footer-top--}}
    @include('Page.Home.Footer-top.footer-top')
{{--Kết thúc khu vực footer-top--}}



{{-----------------------------------------------------------------------------------}}


{{--Khu vực footer-bottom--}}
    @include('Page.Home.Footer-bottom.footer-bottom')
{{--Kết thúc khu vực footer-top--}}


{{-----------------------------------------------------------------------------------}}

</body>
</html>
