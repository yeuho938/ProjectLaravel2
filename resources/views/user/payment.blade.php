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
	</style>
</head>
<body>

	<div  class="container-fluid">
		<p>Đặt mua mẫu <strong class="text-danger"></strong></p>
		<div class="row" id="thongtin">
			<div class="col-lg-1"></div>
			<div class="col-lg-3">
				<p><p class="btn btn-danger">1</p> Nhập thông tin khách hàng:</p>
				<form name="frm">
					<label>Họ và tên(*)</label>
					<input type="text" class="form-control mb-3" name="hoten" id="hoten" placeholder="*Họ và tên">
					<label>Số điện thoại(*)</label>
					<input type="text" class="form-control mb-3" name="dienthoai" id="dienthoai" placeholder="*Điện Thoại">
					<label>Email(*)</label>
					<input type="text" class="form-control mb-3" name="email" id="email" placeholder="*Email">
					<label>Địa chỉ(*)</label>
					<input type="text" class="form-control mb-3" name="diachi" id="diachi" placeholder="Địa Chỉ">
					<label>Ghi chú</label>
					<textarea rows="4" class="form-control mb-3" cols="40" name="ghichu" placeholder="Ghi chú"></textarea>
				</form>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-4">
				<p><p class="btn btn-danger" >2</p> Xem lại đơn hàng:</p>
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
							<div class="col-4">
								<input class="form-control" type="text" name="mauudai">
							</div>
							<div class="col-3 btn btn-danger" style="height: 80%">Áp dụng</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6"><p>Tạm tính:</p></div>
							<div class="col-6"><p id="tamtinhh"></p></div>
						</div>
						<div class="row" style="display: flex;">
							<div class="col-6"><p>Phí vận chuyển</p></div>
							<div class="col-6" style="margin-left: 5%;color: red"><p id="phivc">
								<?php $phi = 10000;
								echo $phi."VND";?>
							</div>
						</div>
						<div class="row" >
							<div class="col-6"><p>Giảm giá</p></div>
							<div class="col-6"><p class="text-danger" id="giamgia"></p></div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-6">
								<strong class="text-uppercase">Tổng cộng:</strong>
							</div>
							<div class="col-6">
								<!-- <p class="text-success" id="tongtien">2.520.000 đ</p> -->
								<input type="text" class="form-control" disabled id="tongtienn" name="">
							</div>
						</div>
					</div>
				</div>
				<p>	</p>
				<center>
					<div class="col-6" style="width: 200px">
						<button class="btn btn-danger form-control">
							ĐẶT HÀNG
						</button> 
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
