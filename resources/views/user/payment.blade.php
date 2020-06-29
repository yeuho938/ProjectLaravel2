<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style type="text/css">
		#thongtin{
			display: flex;
		}
		.col-6 #tongtienn{
			font-size: 17px;
			text-align: center;
			color: red;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<p>Đặt mua mẫu <strong class="text-danger"></strong></p>
		<div class="row" id="thongtin">
			<div class="col-lg-1"></div>
			<div class="col-lg-3">
				<p><p class="btn btn-danger">1</p> Nhập thông tin khách hàng:</p>
				@if(Auth::user())
				<?php $user = Auth::user(); ?>
				<form name="frm">
					<label>Họ và tên(*)</label>
					<input type="text" class="form-control mb-3" name="name" id="hoten" value="{{$user->fullname}}">
					<label>Số điện thoại(*)</label>
					<input type="text" class="form-control mb-3" name="phone" id="dienthoai" value="{{$user->phone}}">
					<label>Email(*)</label>
					<input type="text" class="form-control mb-3" name="email" id="email" value="{{$user->email}}">
					<label>Địa chỉ(*)</label>
					<input type="text" class="form-control mb-3" name="address" id="diachi" placeholder="Nhập chi tiết địa điểm">
					<label>Ghi chú</label>
					<textarea rows="4" class="form-control mb-3" cols="40" name="note" placeholder="Ghi chú"></textarea>
				</form>
				@endif
			</div>
			<div class="col-5">
				<p><p class="btn btn-danger">2</p> Chọn hình thức thanh toán:</p>
				<select name="selecttt" class="form-control">
					<option>Chọn hình thức thanh toán</option>
					<option value="1">Internet Banking/ATM nội địa </option>
					<option value="2">Thanh toán qua thẻ ngân hàng</option>
					<option value="3">Nhận hàng rồi thanh toán </option>
				</select>
				<p id="display" class="mt-3"></p>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-4">
				<p><p class="btn btn-danger" >3</p> Xem lại đơn hàng:</p>
				<div class="card">
					<div class="card-header">
						<div class="row">
							<?php $total = 0 ?>
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>Image</th>
										<th>Sản phẩm</th>
										<th>Giá</th>
										<th>Số lượng</th>
										<th>Chỉnh sữa</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($carts as $cart)
									@foreach ($cart->products as $product)
									<tr>
										<td><img id="img_1" src="{{'/storage/'.$product->image}}" style="width: 40%"></td>
										<td>{{$product->name}}</td>
										<td id="gia1">{{$product->price}}</td>
										<td id="sl1">{{$cart->quantity}}</td>
										<td><a href="/user/cartindex">Edit</a></td>
									</tr>
									@endforeach
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-4">
								<p>Nhập Mã Giảm Giá</p>
							</div>
							<form action="/user/payment" method="GET">
								@csrf        
								<input class="form-control" type="text" name="name">								
								<button class="col-3 btn btn-danger" style="height: 80%" type="submit">Áp dụng </button>
							</form>
							
						</div>
						<hr>
						<div class="row">
							<div class="col-6"><p style="font-size: 17px">Tạm tính:</p></div>
							<div class="col-6"><p id="tamtinhh"  style="font-size: 17px">
								<?php
								foreach ($carts as $cart){
									foreach ($cart->products as $product){
										$total = $total + ($product->price * $cart->quantity);
									}
								}
								echo $total;
								?>
							</p>
						</div>
					</div>
					<div class="row" style="display: flex;">
						<div class="col-6"><p style="font-size: 17px">Phí vận chuyển</p></div>
						<div class="col-6" style="margin-left: 5%;color: red">
							<p style="font-size: 17px">
								<?php $phi = 10000;
								echo $phi." VND";?></p>
							</div>
						</div>
						<div class="row" >
							<div class="col-6"><p style="font-size: 17px">Giảm giá</p></div>
							<div class="col-6"><p class="text-danger" id="giamgia" style="font-size: 17px">
								<?php 
								$giamgia =0;
								foreach($discounts as $pay){
									$giamgia = ($giamgia + $pay->percent) ;
								}
								echo $giamgia." %";
								?>
							</p></div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-6">
								<strong class="text-uppercase" style="font-size: 17px">Tổng cộng:</strong>

							</div>
							<div class="col-6">

								<input type="text" class="form-control" disabled id="tongtienn" value="<?php echo ($giamgia* $total)/100 + $phi.' VND' ; ?>">
							</div>
						</div>
					</div>
				</div>
				<p>	</p>
				<center>
					<div class="col-6" style="width: 200px">
						<form action="/admin/order" method="POST">
							@csrf 
							<button class="btn btn-danger form-control" type="submit">
								ĐẶT HÀNG
							</button> 
						</form>
						
					</div>
				</center>
				
			</div>

			<div class="col-lg-1">	</div>
		</div>
		<div id="thongtin">
			<p style="font-weight: bold; text-decoration: underline;" class="text-danger">THÔNG TIN HÓA ĐƠN</p>
			<p id="showtt"></p>
		</div>
	</div>
</body>
</html>
