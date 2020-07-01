
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
						<th scope="col">Name Discount</th>
						<th scope="col">Percent Discount</th>
						<th scope="col">Insert</th>	
						<th scope="col">Delete</th>	
						<th scope="col">Edit</th>						
					</tr>
				</thead>
				@foreach($discounts as $discount)
				<tbody>
					<tr>
						<th scope="row"> {{$discount->id}}</th>
						<td>{{$discount->name}}</td>
						<td>{{$discount->percent}}</td>
						<td>
							<a href='/discount/create'> Insert</a>
						</td>						
						<td>
							<form action='{{"/discount/index/".$discount->id}}' method ="POST">
								@csrf 
								@method("DELETE")
								<button type="submit" name ="delete" style="margin-left: 30px; border: 1px; background: pink; font-size: 17px;"> Delete </button>      
							</form>
						</td>
						<td>
							<a href='{{"/discount/".$discount->id."/edit"}}'> Edit</a>
						</td>
					</tr>			
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>