<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .box{
      width: 500px;
    }
    #chudau{
    margin-left: -50%;
    }
    #chudau a{
      text-decoration: none;
      color: black;
      font-size: 17px;
      margin-left: 0px;
    }
    #chudau a:hover{
      color: #4E7EF8;

    }
  </style>
</head>
<body>
  <div>
    @include('/partials/head1')
    @include('/partials/danhmuc')
  </div>
  <center>
      <span id ="chudau"><a href="/admin/clothes" >Quản lý sản phẩm</a> > <a href="/admin/clothes/{{$array->id}}/edit">Trang sửa sản phẩm</a></span><br>

    <h1 style="color: red;"> CHỈNH SỬA SẢN PHẨM </h1>
    <div class="box">
      <form class="form" method="POST" action="{{'/admin/clothes/'.$array->id}}" enctype="multipart/form-data">
       @csrf
       @method("PATCH")
       <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Tên sản phẩm</label>
          <input type="text" class="form-control" id="inputEmail4" name ="name" value="{{$array -> name}}" placeholder="Tên sản phẩm">
          @error('name')
          <div class="alert alert-success">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="quantity">Số lượng</label>
          <input type="text" class="form-control" id="inputPassword4" name ="quantity"value="{{$array -> quantity}}" placeholder="Password">
          @error('quantity')
          <div class="alert alert-success">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="name" style="float: left; font-size: 18px;"> Chọn loại sản phẩm</label><br>
        <select name="name" id="category" class="form-control" >
         @foreach($categories as $category) 
         <option value="{{$category->id}}"> {{$category->name}}</option>
         @endforeach
       </select>    
       @error('name')
       <div class="alert alert-success">{{ $message }}</div>
       @enderror   
     </div>
     <div class="form-row">
       <div class="form-group col-md-6">
        <label for="price">Giá</label>
        <input type="text" class="form-control" id="inputPassword4" name ="price" value="{{$array -> price}}" placeholder="Password">
        @error('price')
        <div class="alert alert-success">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Giá cũ</label>
        <input type="text" class="form-control" id="inputEmail4" name ="priceOld" value="{{$array -> oldPrice}}" placeholder="Giá cũ">
      </div>  

    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="description">Mô tả</label>
        <input type="text" class="form-control" id="inputEmail4" name="description" value="{{$array -> description}}" placeholder="Mô tả">
        @error('description')
        <div class="alert alert-success">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="image">Hình ảnh</label>
        <input type="file" class="form-control" id="inputPassword4" name="image" placeholder="Hình ảnh">
        @error('image')
        <div class="alert alert-success">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-default" style=" font-size: 18px; color:green ;"> Chỉnh sửa </button>
  </form>
</div>
</center>
</body>
</html>
