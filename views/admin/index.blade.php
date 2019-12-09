<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>User List</h1>
	<a href="/home">Back</a> | 
	<a href="/logout">logout</a>
	
	<table border="1">
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>CONTACT</td>
			<td>USERNAME</td>
			<td>ACTION</td>
		</tr>

	 @foreach($users as $s)
		<tr>
			<td>{{$s->id}}</td>
			<td>{{$s->name}}</td>
			<td>{{$s->contact}}</td>
			<td>{{$s->username}}</td>
			<td>
				<a href="{{route('author.edit', $s->id)}}">Edit</a> | 
				<a href="{{route('author.delete', $s->id)}}">Delete</a> | 
				<a href="{{route('author.details', $s->id)}}">Details</a>
			</td>
		</tr>
	@endforeach

	</table>

</body>
</html>