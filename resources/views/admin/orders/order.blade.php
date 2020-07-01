<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div>
		@include('/partials/header')
		@include('/partials/danhmuc')
	</div>
	<div class="container">
		<div class ="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Name customer</th>
						<th scope="col">Phone</th>	
						<th scope="col">Email</th>	
						<th scope="col">Address</th>
						<th scope="col">Product name</th>
						<th scope="col">Code</th>	
						<th scope="col">Percent </th>	
						<th scope="col">Total</th>
						<th scope="col">Status</th>					
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$orders->name}}</td>
						<td>{{$orders->phone}}</td>
						<td>{{$orders->email}}</td>
						<td>{{$orders->address}}</td>    
						<td>{{$orders->code}}</td> 
						<td>{{$orders->percent}}</td>
						<td>{{$orders->total}}</td>
						<td>{{$orders->note}}</td>
					</tr>			
				</tbody>
			</table>
		</div>
	</div>
	<div style="margin-top:30%; ">
		@include('/partials/footer')
	</div> 
</body>
</html>