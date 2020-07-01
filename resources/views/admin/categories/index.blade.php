
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
	<h3> List of Category</h3>
	<div id="main">
		<!-- <div class="container">
			<h1 class="title-page"></h1>
			<div class="group-tabs">
				 Nav tabs
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
					<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
					<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
				</ul>

				 Tab panes
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">This is Home content</div>
					<div role="tabpanel" class="tab-pane" id="profile">This is Profile content</div>
					<div role="tabpanel" class="tab-pane" id="messages">This is Messages content</div>
					<div role="tabpanel" class="tab-pane" id="settings">This is Settings content</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="container">
		<div class ="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Name Category</th>
						<th scope="col">Insert</th>	
						<th scope="col">Delete</th>	
						<th scope="col">Edit</th>						
					</tr>
				</thead>
				@foreach($categories as $category)
				<tbody>
					<tr>
						<th scope="row"> {{$category->id}}</th>
						<td>{{$category->name}}</td>
						<td>
							<a href='/category/create'> Insert</a>
						</td>						
						<td>
							<form action='{{"/category/".$category->id}}' method ="POST">
								@csrf 
								@method("DELETE")
								<button type="submit" name ="delete" style="margin-left: 30px; border: 1px; background: pink; font-size: 17px;"> Delete </button>      
							</form>
						</td>
						<td>
							<a href='{{"/category/".$category->id."/edit"}}'> Edit</a>
						</td>
					</tr>			
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>