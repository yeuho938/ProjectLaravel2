<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/homedm.css">

  <style type="text/css">
    #detail, #cart,#tim{
      color: orange
    }
  </style>
</head>
<body>
 @include('partials\header')
 <div class="container-fluid" >
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 80%">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" >
      <div class="item active">
        <img src="https://i.ytimg.com/vi/KRfajXP6odg/maxresdefault.jpg" alt="" style="height: 800px; width: 100%;">
      </div>              
      <div class="item">
        <img src="https://i.ytimg.com/vi/88FgYW43y2M/maxresdefault.jpg" alt="" style="height: 800px; width: 100%;">
      </div>
      <div class="item">
        <img src="https://i.ytimg.com/vi/dO8aDqJh1SQ/maxresdefault.jpg" alt="" style="height: 800px; width: 100% ">
      </div>
      <div class="item">
        <img src="https://i.ytimg.com/vi/C1xarrbf8fo/maxresdefault.jpg" alt="" style="height: 800px; width: 100%">
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
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
<h2 style="color: red; margin-left: 30%;"> TẤT CẢ SẢN PHẨM</h2>
<div class="container" style="display: flex;">
  <div class="row" style="float: left;width: 30%; margin-left: -20%;padding:20px;margin-top: -20px">
    <div class="btrix_blockmenu">
      <ul>
        <li><a href="#">DANH MỤC SẢN PHẨM</a></li>
        @foreach($categories as $cate)
        <li><a href="#">{{$cate->name}}</a></li>
        @endforeach 
        <li style="border: 1px solid grey"><a href="#">Sản phẩm mới</a>
          <img src="image/somi.jpg">

        </li>
      </ul>
    </div>
  </div>
  <div class="row" style="float: right; margin-left: 35%;">
    <div id="display">
      @foreach($clothesdata as $clothes)
      <div class="product-grid6">
        <div class="product-image6">
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
  <div>
  </div>

</div>
<div class="container-fluid">
  <center>
    <a class="btn btn-danger" href="home/?page={{$page-1}}">Previous</a>
    <a class="btn btn-danger" href="home/?page={{$page+1}}">Next</a>
  </center>
  
</div>
<hr>
<div class="container-fluid">
  @include('partials\footer')
</div>
</body>
</html>




