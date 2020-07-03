<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <style type="text/css">
    #chudau{
      display: flex;
      height: 50px;
      
    }
  </style>
</head>
<body>
  <div>
    @include('/partials/head1')
    @include('/partials/danhmuc')
  </div>
  
  <center><h2> DANH SÁCH SẢN PHẨM</h2>
    <a href="/admin/clothes/create" class = "btn btn-success"> Thêm sản phẩm</a>
    <a href="/category/index" class = "btn btn-success"> Loại sản phẩm</a>
     <a href="/discount/index" class = "btn btn-success"> Mã giảm giá</a>
  </center>
  <div class="container" style="margin-top: 1%;">
    <div class ="row">
      <table class=" table-bordered table-dark" width="1400px" style="margin-left: -80%">
        <thead>
          <tr>
            <th scope="col" align="center">STT</th>
            <th scope="col" align="centre" width="150px">Tên sản phẩm  </th>
            <th scope="col"  width="150px">Hình ảnh</th>
            <th scope="col"  width="150px">Loại sản phẩm</th>
            <th scope="col" width="100px">Giá</th>
            <th scope="col" width="100px">Giá cũ</th>
            <th scope="col" width="100px">Số lượng</th>
            <th scope="col"> Mô tả</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        @foreach($clothesdata as $clothes)
        <tbody>
          <tr>
            <th></th>
            <th scope="row"> {{$clothes->name}}</th>
            <td><img src="{{ '/storage/'.$clothes->image}}" width="150px" height="150px" ></td>
            <td>{{$clothes->category->name}}</td>
            <td>{{$clothes->getDisplayPrice()}}</td>
            <td>{{$clothes->getDisplayPriceOld()}}</td>
            <td>{{$clothes->quantity}}</td>    
            <td>{{$clothes->description}}</td>     
            <td>
              <form action='{{"/admin/clothes/".$clothes->id}}' method ="POST">
                @csrf 
                @method("DELETE")                                                                                                                                                                                     
                <button type="submit" name ="delete" style="margin-left: 30px; background: #ffcccc; font-size: 17px;"> Delete </button>      
              </form>
            </td>
            <td>
              <form action='{{ "/admin/clothes/".$clothes ->id."/edit"}}' method ="GET">  
                @csrf           
                <button type="submit" name ="delete" style="margin-left: 30px; background: #ffcccc; font-size: 17px;"> Edit </button>      
              </form>
            </td>

          </tr>     
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
  <div style="margin-top:10%; ">
    @include('/partials/footer')
  </div> 
</body>
</html>