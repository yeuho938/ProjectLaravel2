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
  <div>
   @include('/partials/head1')
 </div>
 <center>
  <h1 style="color: red;"> ĐĂNG KÝ TÀI KHOẢN </h1>
  <div class="box">
    <form class="form" method="POST" action="/auth/register" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
      <label for="fullname" style="float: left; font-size: 18px;"> Full Name</label>
      <input type="text" class="form-control" name = "fullname" placeholder="name">
      @error('fullname')
      <div class="alert alert-success">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="username" style="float: left; font-size: 18px;"> Username</label>
      <input type="text" class="form-control" name = "username" placeholder="username">
      @error('username')
      <div class="alert alert-success">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="password" style="float: left; font-size: 18px;"> Password</label>
      <input type="password" class="form-control" name = "password" placeholder="password">
      @error('password')
      <div class="alert alert-success">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="form-group">
      <label for="email" style="float: left; font-size: 18px;"> Email</label>
      <input type="text" class="form-control" name = "email" placeholder="Email">
      @error('email')
      <div class="alert alert-success">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="address" style="float: left; font-size: 18px;"> Address</label>
      <input type="text" class="form-control" name = "address" placeholder="Address">
      @error('address')
      <div class="alert alert-success">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="phone" style="float: left; font-size: 18px;"> Phone</label>
      <input type="text" class="form-control" name = "phone" placeholder="Phone">
      @error('phone')
      <div class="alert alert-success">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-default" style=" font-size: 18px; color:green ;"> Đăng ký</button>
  </form>
</div>
</center>
<div style="margin-top: 10%;">
  @include('/partials/footer')
</div>
</body>
</html>
