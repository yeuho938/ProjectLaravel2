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
  </style>
</head>
<body>
  <center>
    <h1 style="color: red;"> Cập nhật loại sản phẩm</h1>
    <div class="box">
      <form class="form" method="POST" action="{{'/category/'.$cateEdit->id}}" enctype="multipart/form-data">
       @csrf
       @method('PATCH')
       <div class="form-group">
        <label for="category" style="float: left; font-size: 18px;">Tên loại sản phẩm</label>
        <input type="text" class="form-control" name ="category" placeholder="Category" value="{{$cateEdit->name}}"> 
        @error('category')
        <div class="alert alert-success">{{ $message }}</div>
        @enderror               
      </div>
      <button type="submit" class="btn btn-default" style=" font-size: 18px; color:green ;"> Cấp nhật</button>
    </form>
  </div>
</center>
</body>
</html>
