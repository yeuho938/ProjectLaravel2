<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<link rel="stylesheet" type="text/css" href="/css/homedm.css">

	<style type="text/css">
		#boxdetail{
			display:flex;
		}
		#image{
			margin-left: 30%;
		}
		#content{
			margin-left:1%;
			width: 300px;
		}
	</style>
</head>
<body>
	@include('\partials\header')
	<span style="display: flex;"><h2 style="color: red; margin-left: 30%;"> Kết quả tìm kiếm cho từ khóa "{{$seach}} " </h2>  <h3 style=" margin-left: 40%;"> Sắp xếp theo <a href="/home/displayByDescPrice">Giảm dần</a> <a href="/home/displayByAscPrice">Tăng dần</a></h3></span>
	<div class="container" style="display: flex;">
		<div class="row" style="float: left;width: 30%; margin-left: -20%;padding:20px;margin-top: -20px">
			<div class="btrix_blockmenu">
				<ul>
					<li><a href="#">DANH MỤC SẢN PHẨM</a></li>
					<?php $categories=Session::get('category');?>
					@foreach($categories as $cate)
					<li><a href="/home/productOfCate/{{$cate->id}}">{{$cate->name}}</a></li>
					@endforeach 
					<li style="border: 1px solid grey"><a href="#">Sản phẩm mới</a>
						<img src="/image/somi.jpg">

					</li>
				</ul>
			</div>
		</div>
		<div class="row" style="float: right; margin-left: 35%;">
			<div id="display">
				@foreach($research as $clothes)
				<div class="product-grid6">
					<div class="product-image6" >
						<p style="border-radius:60%;position: absolute;height: 45px;width: 45px;margin-left: -50%;" class = "btn btn-danger"> 
							<?php  
							$giamgia = 0;
							if($clothes->oldPrice> 0){
								$giamgia = 100-($clothes->price*100)/$clothes->oldPrice;
							}
							echo round($giamgia, 0, PHP_ROUND_HALF_UP)."%";
							?>
						</p>
						<a href="#">
							<img class="pic-1" src="{{'/storage/'.$clothes->image}}" width="250px" height="250px">
						</a>
					</div>
					<div class="product-content">
						<h3 class="title"><a href="#">{{ $clothes->name}}</a></h3>
						<div class="price">{{ $clothes->getDisplayPrice()}}
							<span>{{ $clothes->getDisplayPriceOld()}}</span>
						</div>
					</div>
					<ul class="social">
						<li>
							<form action='{{ "/user/".$clothes ->id."/detail"}}' method="GET">
								<button  class="icon"><i class="fa fa-search" id="detail"></i></button>
							</form>  
						</li>
						<li>
							<form action="/home/logout" method="GET">
								<button data-tip="Add to Wishlist" class="icon"><i class="fa fa-shopping-bag" id="tim"></i></button>
							</form> 
						</li>
						<li>
							<form action='{{ "/user/".$clothes ->id."/cart"}}' method="GET">
								<button data-tip="Add to Cart" class="icon"><i class="fa fa-shopping-cart" id="cart"></i></button>
							</form>
						</li>
					</ul>

				</div>
				@endforeach

			</div>
		</div>
	</div>
	<div class="container-fluid" style="margin-top: 10%; background-color: black">
		@include('\partials\footer')
	</div>
</body>
</html>