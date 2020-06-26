<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
  <link rel="stylesheet" type="text/css" href="/css/homedm.css">

  <style type="text/css">
    #detail, #cart,#tim{
      color: orange
    }
  </style>
</head>
<body>
 @include('partials\header')
<hr>
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
<hr>
<center><h2 style="color: red"> DANH SÁCH SẢN PHẨM</h2></center>
<div class="container" style="display: flex;">
  <div class="row" style="float: left;width: 30%; margin-left: -20%;padding:20px">
    <div class="btrix_blockmenu">
      <ul>
        <li><a href="#">DANH MỤC SẢN PHẨM</a></li>
        <li><a href="#">Váy </a></li>
        <li><a href="#">Áo sơ mi</a></li>
        <li><a href="#">Quần đui</a></li>
        <li><a href="#">Áo phồng</a></li>
        <li><a href="http://www.buivansum.name.vn/">Quần dài</a></li>
      </ul>
    </div>
  </div>
  <div class="row" style="float: right; margin-left: 35%;">
    <div id="display">
      @foreach($aokhoacs as $aokhoac)
      @if($aokhoac->category_id==3)
      <div class="product-grid6">
        <div class="product-image6">
          <a href="#">
            <img class="pic-1" src="{{ '/storage/'.$aokhoac->image}}" width="250px" height="250px">
          </a>
        </div>
        <div class="product-content">
          <h3 class="title"><a href="#">{{ $aokhoac->name}}</a></h3>
          <div class="price">{{ $aokhoac->getDisplayPrice()}}
            <span>{{ $aokhoac->getDisplayPriceOld()}}</span>
          </div>
        </div>
        <ul class="social">
          <li>
            <form action='{{ "/user/".$aokhoac ->id."/detail"}}' method="GET">
              <button  class="icon"><i class="fa fa-search" id="detail"></i></button>
            </form>  
          </li>
          <li>
            <form action="/home/logout" method="GET">
              <button data-tip="Add to Wishlist" class="icon"><i class="fa fa-shopping-bag" id="tim"></i></button>
            </form> 
          </li>
          <li>
            <form action='{{ "/user/".$aokhoac ->id."/cart"}}' method="GET">
              <button data-tip="Add to Cart" class="icon"><i class="fa fa-shopping-cart" id="cart"></i></button>
            </form>
          </li>
        </ul>

      </div>
      @endif
      @endforeach

    </div>
  </div>

</div>
<hr>
<div class="container-fluid">
  @include('partials\footer')
</div>
</body>
</html>




