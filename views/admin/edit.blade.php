<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>Edit User</h1>
	<a href="{{route('admin.index')}}">Back</a> | 
	<a href="/logout">logout</a>
	
	<form method="post">
	{{csrf_field()}}
	<table border="1">
	@foreach($users as $s)
		<tr>
			<td>NAME</td>
			<td><input type="text" name="name" value="{{$s->name}}"></td>
		</tr>
		<tr>
			<td>PASSWORD</td>
			<td><input type="text" name="password" value="{{$s->password}}"></td>
		</tr>
		<tr>
			<td>Contact</td>
			<td><input type="text" name="contact" value="{{$s->contact}}"></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit" value="update"></td>
			<td></td>
		</tr>
	</table>
	@endforeach
</form>
@foreach($errors->all() as $err)
	{{$err}} <br>
@endforeach	
</body>
</html>