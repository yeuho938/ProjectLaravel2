<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
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
				@foreach($categories as $category)
				<tbody>
					<tr>
						<td>{{$clothes->category->name}}</td>
						<td>{{$clothes->getDisplayPrice()}}</td>
						<td>{{$clothes->getDisplayPriceOld()}}</td>
						<td>{{$clothes->quantity}}</td>    
						<td>{{$clothes->description}}</td> 
					</tr>			
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>