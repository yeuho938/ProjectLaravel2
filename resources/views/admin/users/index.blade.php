
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
	@include('/partials/head1')
	@include('/partials/danhmuc')
	<center>
		<h3 style="color: red"> THÔNG TIN CỦA USERS</h3>
	</center>
	

	<div class="container">
		<div class ="row">
			<table class="table table-bordered" style="margin-left: -85%">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Full Name</th>
						<th scope="col">Username </th>
						<th scope="col">Password</th>
						<th scope="col">Email</th>
						<th scope="col">Address</th>
						<th scope="col">Phone</th>
						<th scope="col">Role</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				@foreach($userdata as $user)
				<tbody>
					<tr>
						<th scope="row"> {{$user->id}}</th>
						<td>{{$user->fullname}}</td>
						<td>{{$user->username}}</td>
						<td>{{$user->password}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->address}}</td>
						<td>{{$user->phone}}</td>
						<td>{{$user->role}}</td>
						<td>
							<form action='{{"/admin/users/".$user->id}}' method ="POST">
								@csrf 
								@method("DELETE")
								<button type="submit" name ="delete" style="margin-left: 30px; background: #ffcccc; font-size: 17px;"> Delete </button>      
							</form>
						</td>
					</tr>			
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
	<div style="margin-top: 20%;">
		@include('/partials/footer')
	</div> 
</body>
</html>