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
    #sapxep a{
      text-decoration: none;
      color: black;
      font-size: 16px;
    }
    .dropdown a{
      text-decoration: none;
      color: black;
    }
    .dropdown-menu li a{
      font-size: 16px
    }
  </style>
</head>
<body>
  <?php 
  if(isset($_GET['addcart'])){
    echo '<script type="text/javascript">alert("' . $_GET['addcart'] . '")</script>';
  }
  ?>
  @if(Auth::user())
  @if(Auth::user()->role==0)
  @include('partials\header')
  @else
  @include('partials\head1')
  @endif
  @else
  @include('partials\head1')
  @endif
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
          <img src="/image/anh0.jfif" alt="" style="height: 700px; width: 100%;">
        </div>              
        <div class="item">
          <img src="/image/anh3.jpg" alt="" style="height: 700px; width: 100%;">
        </div>
        <div class="item">
          <img src="/image/anh1.jpg" alt="" style="height: 700px; width: 100% ">
        </div>
        <div class="item">
          <img src="/image/anh2.jpg" alt="" style="height: 700px; width: 100%">
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
  <div class="container-fluid" style="margin-bottom: 20px">
    <span style="display: flex;"><h2 style="color: red; margin-left: 30%;"> TẤT CẢ SẢN PHẨM</h2>
      <h3 style="float: right; margin-left:35%">
        <li class="dropdown" style="list-style-type: none;"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="sp"> Sắp xếp theo giá<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/home/displayByDescPrice">Giảm dần </a></li>
            <li><a href="/home/displayByAscPrice">Tăng dần</a></li>
          </ul>
        </li> 
      </h3>
    </span>
  </div>
  <hr>
  <div class="container" style="display: flex;">
    <div class="row" style="float: left;width: 30%; margin-left: -20%;padding:20px;margin-top: -20px">
      <div class="btrix_blockmenu">
        <ul>
          <li><a href="#">DANH MỤC SẢN PHẨM</a></li>
          <?php $categories=Session::get('category');?>
          @foreach($categories as $cate)
          <li><a href="/home/productOfCate/{{$cate->id}}">{{$cate->name}}</a></li>
          @endforeach 
        </ul>
      </div>
    </div>
    <div class="row" style="float: right; margin-left: 35%;">
      <div id="display">
        @foreach($clothesdata as $clothes)
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

<div class="container-fluid">
  <center>
    <a class="btn btn-danger" href="/home/user/?page={{$page-1}}">Previous</a>
    <a class="btn btn-danger" href="/home/user/?page={{$page+1}}">Next</a>
  </center>

</div>
<hr>
<div class="container-fluid">
  @include('partials\footer')
</div>
</body>
</html>




