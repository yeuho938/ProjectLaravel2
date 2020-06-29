
<!DOCTYPE html>
<html>
<head>
 <title></title>
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>
<body>
  <div>
   @include('/partials/head1')
 </div>
 <div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-3">
      <div class="account-box">
        <div class="logo" style="margin-bottom: 50px">
         <img src="/image/logo.png"  title="" width="100px" height="100px">
       </div>
       <hr>
       <div>
        <form class="form-signin" method="POST" action="/auth/login" enctype="multipart/form-data">
         @csrf
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
           @error('username')
          <div class="alert alert-success">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" required />
          @error('password')
          <div class="alert alert-success">{{ $message }}</div>
          @enderror
        </div>
        <label class="checkbox">
          <input type="checkbox" value="remember-me" />
          Keep me signed in
        </label>
        <p style="color: red"> {{ Request::get('error')}}</p>
        <button class="btn btn-lg btn-block purple-bg" type="submit">
        Đăng nhập</button>
      </form>
    </div>
    <a class="forgotLnk" href="http://www.jquery2dotnet.com">Tôi không thể truy cập tài khoản của mình</a>
    <div class="or-box">
      <span class="or">Hoặc</span>
      <div class="row">
        <div class="col-md-6 row-block">
          <a href="http://www.jquery2dotnet.com" class="btn btn-facebook btn-block">Facebook</a>
        </div>
        <div class="col-md-6 row-block">
          <a href="http://www.jquery2dotnet.com" class="btn btn-google btn-block">Google</a>
        </div>
      </div>
    </div>
    <div class="or-box row-block">
      <div class="row">
        <div class="col-md-12 row-block">
          <form action="/auth/register" method="GET">
           @csrf
           <button type="submit" class="btn btn-primary btn-block">  Tạo tài khoản mới</button>
         </form>           
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>
<!-- <div style="margin-top: 10%;">
  @include('/partials/footer')
</div> -->
</body>
</html>
