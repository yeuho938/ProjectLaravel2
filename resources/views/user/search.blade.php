<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/home.css">

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
	<center><h2 style="color: red"> DANH SÁCH TÌM KIẾM</h2></center>
	<div class="container">
		<div class="row" >
			<div id="display">
				@foreach($research as $search)

				<div class="product-grid6">
					<div class="product-image6">
						<p style="border-radius:60%;position: absolute;height: 45px;width: 45px;margin-left: -50%;" class = "btn btn-danger"> 
							<?php  
							$giamgia = 0;
							if($search->getDisplayPriceOld() > 0){
								$giamgia = 100-($search->price*100)/$search->oldPrice;
							}
							echo round($giamgia, 0, PHP_ROUND_HALF_UP)."%";
							?>
						</p>
						<a href="#">
							<img class="pic-1" src="{{ '/storage/'.$search->image}}" width="250px" height="250px">
						</a>
					</div>
					<div class="product-content">
						<h3 class="title"><a href="#">{{ $search->name}}</a></h3>
						<div class="price">{{ $search->price}}
							<span>{{ $search->oldPrice}}</span>
						</div>
					</div>
					<ul class="social">
						<li>
							<form action='{{ "/user/".$search ->id."/detail"}}' method="GET">
								<button  class="icon"><i class="fa fa-search"></i></button>
							</form>  
						</li>
						<li>
							<form action="/home/logout" method="GET">
								<button data-tip="Add to Wishlist" class="icon"><i class="fa fa-shopping-bag"></i></button>
							</form> 
						</li>
						<li>
							<form action='{{ "/user/".$search ->id."/cart"}}' method="GET">
								<button data-tip="Add to Cart" class="icon"><i class="fa fa-shopping-cart"></i></button>
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