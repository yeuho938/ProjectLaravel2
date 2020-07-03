<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>
	<div>
		@include('/partials/header')
	</div>
	<?php $i =0; ?>
	<center><h3> Thông tin chi tiết của bạn</h3></center>

	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active btn-success" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân</a>
			</li>
			<li class="nav-item">
				<a class="nav-link  btn-success" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Thông tin đơn hàng</a>
			</li>
			<li style="float: right;">
				<form action="/home/logout" method="GET">
					<button  class="btn btn-danger" ><i class="fas fa-registered"></i>Đăng xuất</button>
				</form>
			</li>
		</ul>
		@foreach($information as $info)
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div >
					<p style="font-size: 17px;font-weight:bold;"> Tên đây đủ:</p>
					<h4>{{$info->name}}</h4>
					<p style="font-size: 17px;font-weight:bold;"> Số điện thoại: </p>
					<h4>{{$info->phone}}</h4>
					<p style="font-size: 17px;font-weight:bold;"> Email:  </p>
					<h4>{{$info->email}}</h4>
					<p style="font-size: 17px;font-weight:bold;"> Địa chỉ:  </p>
					<h4>{{$info->address}}</h4>
				</div>
				
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<center><h2 style="margin-top: -150px;">Các đơn hàng bạn đã đặt</h2></center>
				<table class="table table-bordered" style="margin-top:30px ">
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
					@foreach($information as $info)
					<tbody>
						<tr>
							<td>
								<?php echo $i = $i+1; ?>
							</td>
							<td>{{$info->name}}</td>
							<td>{{$info->phone}}</td>
							<td>{{$info->email}}</td>
							<td>{{$info->address}}</td>    
							<td>{{$info->code}}</td> 
							<td>{{$info->percent}}</td>
							<td>{{$info->total}}</td>
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
													@foreach(json_decode($info->detail) as $product)								
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
							<td>{{$info->note}}</td>
						</tr>			
					</tbody>
					@endforeach
				</table>
			</div>
			@endforeach
		</div>

	</body>
	</html>

