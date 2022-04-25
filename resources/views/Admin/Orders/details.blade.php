@extends('Admin.Master.Master')
@section('title', 'Danh sách bình luận sản phẩm')
@section('content')


		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đặt hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin khách hàng</div>
												<div class="panel-body">
													<strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : {{ $order->fullname }}</strong> <br>
													<strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : Số điện thoại: {{ $order->phone }}</strong>
													<br>
													<strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : {{ $order->address }}</strong>
												</div>
											</div>
										</div>
									</div>


								</div>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Thành tiền</th>

										</tr>
									</thead>
									<tbody>
										@foreach ($order->details as $key => $detail)
										<tr>
											<td>{{$key + 1 }}</td>
											<td>
												<div class="row">
													<div class="col-md-4">
														<img width="100px" src="../uploads/{{$detail->image }}" class="thumbnail">
													</div>
													<div class="col-md-8">
														<p><b>Mã sản phẩm</b>: {{$detail->code }}</p>
														<p><b>Tên Sản phẩm</b>: {{$detail->name }}</p>
														<p><b>Số lương</b> : {{$detail->quantity }}</p>
													</div>
												</div>
											</td>
											<td>{{ number_format($detail->price,0,"",".")}} VNĐ</td>
											<td>{{ number_format( $detail->price * $detail->quantity,0,"",".")}} VNĐ</td>

										</tr>
										@endforeach

									</tbody>

								</table>
								<table class="table">
									<thead>
										<tr>
											<th width='70%'>
												<h4 align='right'>Tổng Tiền :</h4>
											</th>
											<th>
												<h4 align='right' style="color: brown;">{{number_format($order->total,0,"",".")}} VNĐ</h4>
											</th>

										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
								<div class="alert alert-primary" role="alert" align='right'>
									<a name="" id="" class="btn btn-success" href="{{route('order.approved',['orderId'=> $order->id])}}" role="button">Đã xử lý</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->




@endsection
