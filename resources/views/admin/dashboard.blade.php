<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" >

	<style type="text/css">
		.col-sm-3 img:hover{
			transform:scale(1.1)

		}
	</style>
</head>
<body>
	@include('/partials/head1') 
	<div class="container-fluid">
		<div class="row" id="menu">
			<div id="viewport">
				<div id="sidebar">
					<header>
						<a href="#">Serena</a>
					</header>
					<ul class="nav">
						<li>
							<a href="#">
								<form action="/admin/dashboard" method="get">
									<i class="fas fa-tachometer-alt"></i>
									<button>Trang admin</button>
								</form>						
							</a>
						</li>

						<li>
							<a href="#">
								<form action="/admin/users" method="GET">
									<i class="fas fa-user"></i>
									<button>Quản lý người dùng</button>
								</form>

							</a>
						</li>
						<li>					
							<a href="#">
								<form action="/admin/clothes" method="GET">
									<i class="fas fa-archive"></i> 
									<button>Quản lý sản phẩm</button>
								</form>
							</a>
						</li>
						<li>
							<a href="#">
								<form action="/admin/order" method="GET">
									<i class="fas fa-cart-plus"></i> 
									<button>Quản lý đơn đặt hàng</button>
								</form>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-chart-area"></i> 
								<button>Thống kê</button>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-address-card"></i>
								<button>Liên hệ</button>
							</a>
						</li>
					</ul>
				</div>		
			</div>
		</div>
		<div class="row" id="content">
			<div class="container-fluid" id="menungang" >
				<div class="row" >
					<div class="col-sm-3">
						<a class="list" href="Home/hoasinhnhat.php"><img src="https://cf.shopee.vn/file/705d72882bedf48214821d72918d507e" class="img-rounded" alt="Cinque Terre" title="" width="304" height="236" ></a>
					</div>
					<div class="col-sm-3">
						<a class="list" href="Home/hoasukien.php"><img src="https://file.hstatic.net/1000138641/file/bo_trang.png" class="img-rounded" alt="Cinque Terre" title="" width="304" height="236"></a>
					</div>
					<div class="col-sm-3">
						<a class="list" href="Home/hoakhaitruong.php"><img src="https://www.noithathoami.com/wp-content/uploads/2019/09/4-1.jpg" class="img-rounded" title="" alt="Cinque Terre" width="304" height="236"></a>
					</div>
					<div class="col-sm-3">
						<a  class="list" href="Home/hoacuoi.php"><img src="https://ae01.alicdn.com/kf/HTB1K.LpUSzqK1RjSZPcq6zTepXa0/Trung-Qu-c-C-i-Hanfu-Trang-Ph-c-cho-Ph-N-Ph-ng-ng-H.jpg_q50.jpg" class="img-rounded" alt="Cinque Terre" title="" width="304" height="236"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div style="margin-top: 40%;">
		@include('/partials/footer')
	</div> 
</body>
</html>