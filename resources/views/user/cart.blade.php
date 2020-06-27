<!DOCTYPE html>
<html>
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<title></title>
	<style type="text/css">
		#chudau a{
			text-decoration: none;
			color: black;
			font-weight: bold;
		}
		#chudau a:hover{
			color: #4E7EF8;

		}
		#giohang{
			width: 300px;
			margin-left: 5%;
			font-size: 17px;
		}
	</style>
</head>
<body>
	@include('partials\header')
	<span id ="chudau"><a href="/home/user" >Trang chủ</a> > <a href="/user/cartindex">Trang giỏ hàng</a></span><br>
	<hr>
	<button class = "btn btn-danger" id="giohang">Giỏ hàng của bạn</button>
	<div class="container-fluid" style="margin-left: 15%;">
		<div class="row">
			<div class="col-sm-8 col-md-8 col-md-offset-1">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th class="text-center">Price</th>
							<th class="text-center">Total</th>
							<th> Xóa</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cartdata as $cart)
						<tr>
							<td class="col-sm-8 col-md-6">
								<div class="media">
									<a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{'/storage/'.$cart->image}}" style="width: 72px; height: 72px;"> </a>
									<?php

									$total = 0; 

									?>
									<div class="media-body">
										<h4 class="media-heading"><a href="#">{{$cart->name}}</a></h4>
										<h5 class="media-heading"> by <a href="#">Brand name</a></h5>
										<span>
										Status: </span><span class="text-success"><strong>In Stock</strong>
										</span>
									</div>
								</div>
							</td>
							<td class="col-sm-1 col-md-2" style="text-align: center">
								<form>
									@csrf
									<span style="display: flex;">
										
										<a href="/user/cartindex/{{$cart->id}}/increase"class = "btn btn-danger">+</a>
										<input type="text" name="quantity" value="{{$cart->quantity}}" class="form-control">
										<a href="/user/cartindex/{{$cart->id}}/crease"class = "btn btn-danger">-</a>
									</span>
									
								</form>
							</td>
							<td class="col-sm-1 col-md-1 text-center"><strong>{{$cart->price}}</strong>
							</td>
							<td class="col-sm-1 col-md-1 text-center"><strong>{{$cart->price * $cart->quantity}}</strong></td>
							
							<td class="col-sm-1 col-md-1">
								<form action="/user/cartindex/{{$cart->id}}" method="post">
									@csrf
									@method("DELETE")
									<button class = "btn btn-danger" type="submit" >Xóa</button>
								</form>
							</td>
							
						</tr> 
						@endforeach
						
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<h5> Tổng tạm thời </h5>
							</td>
							<td class="text-right">
								<h5><strong> 
									<?php
									foreach ($cartdata as $cart) {
										$total = $total + ($cart->price * $cart->quantity);
									}
									echo $total;
									?>

								</strong></h5>
							</td>
						</tr>
						
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<h3>Tổng cộng</h3>
							</td>
							<td class="text-right">
								<h3><strong> <?php echo $total ?></strong></h3>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<form action="/home/user" method="GET">
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua hàng
									</button>
								</form>
							</td>
							<td>
								<form action="/user/payment" method="GET">
									<button type="submit" class="btn btn-success">
										Thanh toán <span class="glyphicon glyphicon-play"></span>
									</button>
								</form>
							</td>
						</tr>

					</tbody>

				</table>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		@include('partials\footer')
	</div>
</body>
</html>
