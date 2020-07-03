<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
		#cartq{
			display: flex;
		}
		#price{
			display: flex;
		}
		#number{
			width: 60px;
		}
	</style>
</head>
<body>
	@if(Auth::user())
	@if(Auth::user()->role==0)
	@include('partials\header')
	@else
	@include('partials\head1')
	@endif
	@else
	@include('partials\head1')
	@endif
	<h2> CHI TIẾT SẢN PHẨM</h2>
	<div class="row" id="boxdetail">	
		
		<div id ="image" >
			<img src="{{ '/storage/'.$datadetail->image}}" width="300px" height="400px" >
		</div>
		<div id="content">
			<h2> {{$datadetail->name}}</h2>
			<hr>
			<p> Giá</p>
			<span id="price"> <s style="color: red"><p>{{$datadetail->price}}</p></s> &nbsp; &nbsp;&nbsp;<p>{{$datadetail->priceOld}}</p></span>
			<p>{{ $datadetail->description}}</p>
			<hr>
			<span id="cartq">
				<input type="number" name="quantity" value="1" id="number"> &nbsp; &nbsp;&nbsp;
				<form action='{{ "/user/".$datadetail ->id."/cart"}}' method="get">
					<button> Giỏ hàng</button>
				</form>   
			</span>            
		</div>

	</div>
	<div class="container-fluid" style="margin-top: 10%; background-color: black">
		@include('\partials\footer')
	</div>
</body>
</html>