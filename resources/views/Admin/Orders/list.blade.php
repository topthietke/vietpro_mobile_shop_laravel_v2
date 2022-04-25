@extends('Admin.Master.Master')
@section('title', 'Danh sách bình luận sản phẩm')
@section('content')
<link rel="stylesheet" href="css/style-product.css">


    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">

                            <a href="" class="btn btn-success">Đơn đã xử lý</a>
                            <table class="table table-bordered bg-secondary" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên khách hàng</th>
                                        <th class="text-center">Số điện thoại</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $items )
                                        <tr>
                                            <td class="text-center">{{ $orders->firstItem() + $key }}</td>
                                            <td>{{$items->Customers->cus_name}}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{number_format($items->price, 0) }}</td>
                                            <td>
                                                @if ($items->state==0 )
                                                    <a href="" class="btn btn-success my-2 py-3">đã xử lý</a>

                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->





@endsection

