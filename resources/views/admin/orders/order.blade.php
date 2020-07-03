<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style type="text/css">
		.modal-dialog{
			float: left;
		}
	</style>
</head>
<body>
	<div>
		@include('/partials/head1')
		@include('/partials/danhmuc')
	</div>
	<div class="container">
		<div class ="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Tên</th>
						<th scope="col">Số điện thoại</th>	
						<th scope="col">Email</th>	
						<th scope="col">Địa chỉ</th>
						<th scope="col">Mã giảm giá</th>
						<th scope="col">Phần trăm giảm</th>	
						<th scope="col">Tổng tiền </th>	
						<th scope="col">Sản phẩm</th>
						<th scope="col">Trạng thái</th>					
					</tr>
				</thead>
				<?php  $i=0;?>
				@foreach($orders as $order)
				<tbody>
					<tr>
						<td>
							<?php echo $i = $i+1; ?>
						</td>
						<td>{{$order->name}}</td>
						<td>{{$order->phone}}</td>
						<td>{{$order->email}}</td>
						<td>{{$order->address}}</td>    
						<td>{{$order->code}}</td> 
						<td>{{$order->percent}}</td>
						<td>{{$order->total}}</td>
						<td>
							<center>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$i}}">
									Sản phẩm
								</button>

								<div class="modal fade" id="myModal{{$i}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Danh sách sản phẩm đã mua</h4>
												<button type="button" class="close" data-dismiss="modal">×</button>
											</div>
											<div class="modal-body">
												@foreach(json_decode($order->detail) as $product)								
												<img id="img_1" src="{{'/storage/'.$product->image}}" style="width: 40%">
												<p> Tên: {{$product->name}}</p>
												<p> Giá: {{$product->price}}</p>
												<p> Số lượng: {{$product->quantity}}</p>
												@endforeach	
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
											</div>
										</div>
									</div>
								</div>
							</center>
						</td>
						<td>{{$order->note}}</td>
					</tr>			
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
	<div style="margin-top:30%; ">
		@include('/partials/footer')
	</div> 
</body>
</html>