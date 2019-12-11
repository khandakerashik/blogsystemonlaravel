<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>Delete Page</h1>
	<a href="{{route('admin.index')}}">Back</a> | 
	<a href="/logout">logout</a>
	
	<table border="1">
	<tr>
			<td>ID</td>
			@foreach($users as $s)
			<td>{{$s->id}}</td>
		</tr>
		<tr>
			<td>USERNAME</td>
			<td>{{$s->username}}</td>
		</tr>
		<tr>
			<td>PASSWORD</td>
			<td>{{$s->password}}</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>{{$s->name}}</td>
		</tr>
		<tr>
			<td>Contact</td>
			<td>{{$s->contact}}</td> @endforeach
		</tr>
	</table>

<form method="post">
	<h3>Are you sure?</h3>
	<input type="submit" name="submit" value="Confirm">
</form>

</body>
</html>