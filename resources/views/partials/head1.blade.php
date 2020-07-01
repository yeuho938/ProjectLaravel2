<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" >
	<style type="text/css">
		#input{
			width: 350px;
			height: 44px;
		}
		#menu{
			float: right;
			margin-right: 20%;

		}
		.icon{
			height: 30px;
			margin-top: 15px;
			color: black;
		}
		.chu{
			font-size: 15px;
		}
		#tkicon{
			height: 44px
		}
		#menu a{
			color: black;
			font-family: bold;
			font-size: 17px;
		}
		#menu #tc:hover {
			color: red
		}
		#menu #sp:hover {
			color: red
		}
		#menu #lh:hover {
			color: red
		}
		#menu #ht:hover {
			color: red
		}
		#lis button{
			border: 1px solid grey
		}
		#lis button:hover{
			background-color: crimson;
			color: white;
			border: 0px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row" id="head" style="background-color:#FFFAFA">
			<div class="col-sm-1">
				
			</div>
			<div class="col-sm-3" style="padding-top: 20px">
				<i id="phone" class="fas fa-phone-volume"></i> <span class="chu" >Hotline: 035 446 7064</span>
				<i id="email" class="fas fa-envelope"></i> <span class="chu" >Email: hothiyeu012345@gmail.com</span>	
			</div>
			<div class="col-sm-2"  >
				<li style="margin-left: -10%"> <img src="/image/logo.png"  title="" width="100px" height="100px"> </li>
			</div>
			<div class="col-sm-6" style="padding-top: 20px">
				<span style="display: inline-flex;">
					<form class="navbar-form navbar-left" action="/home/search" method="post">
						@csrf 
						<div class="input-group">
							<input type="text" id="input" class="form-control" placeholder="Nhập từ khóa tìm kiếm" name="txtSearch" >
							<div class="input-group-btn">
								<button class="btn btn-default" id="tkicon" type="submit" name="submit">
									<p>Tìm ngay</p>
								</button>
							</div>
						</div>
					</form>
					<span style="display: inline-flex;" id="lis">
						@if(Auth::user())
						<h3> Hi:{{Auth::user()->fullname}}</h3>
						<form action="/home/logout" method="GET">
							<button  class="icon" ><i class="fas fa-registered"></i>Đăng xuất</button>
						</form>
						@else
						<form action="/auth/register">
							<button  class="icon"><i class="fas fa-sign-out-alt"></i>Đăng ký</button>
						</form>
						<form action="/auth/login">
							<button  class="icon"><i class="fas fa-sign-in-alt"></i>Đăng nhập</button>
						</form>
						@endif														
					</span>
				</div>													
			</div>
		</div>
	</div>
	<div class="container-fluid" >
		<div class="row" >
			<center>
				<nav class="navbar navbar-inverse" style="background-color: #CDC9C9">
					<ul class="nav navbar-nav" id="menu">
						
						<li class="dropdown"><a href="/home/user" id="tc"> TRANG CHỦ </a>
						</li>
						<li class="dropdown"><a href="#"> GIỚI THIỆU</a>
						</li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="sp"> SẢN PHẨM<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php $categories=Session::get('category');?>
								@foreach($categories as $cate)
								<li><a href="#">{{$cate->name}}</a></li>
								@endforeach							
							</ul>
						</li>
						<li class="dropdown"><a href="Home/lienhe.php" id="lh"> LIÊN HỆ</a>								
						</li>
						<li class="dropdown"><a href="#" id="ht"> HỔ TRỢ</a>
						</li>		
						<?php $quanly=Session::get('quanly');
						if(Auth::check()){
							$user=Auth::user();
							if($user->role ==1){
								?>						
								<li class="dropdown"><a href="/admin/dashboard" id="qly" >{{$quanly}}</a></li>
							<?php }} ?>				
						</li>						
					</ul>
				</nav>
			</center>
		</div>	
	</div>
</body>
</html>