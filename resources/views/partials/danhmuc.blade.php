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
</head>
<body>
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
								<form action="/admin/clothes" method="GET">
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
	</div>
</body>
</html>