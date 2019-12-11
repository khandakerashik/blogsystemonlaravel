<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>Blogs</h1>
	<a href="/home">Back</a> | 
	<a href="/logout">logout</a>
	
	<table border="1">
		<tr>
			<td>ID</td>
			<td>AUTHOR NAME</td>
			<td>TITLE</td>
			<td>CONTENT</td>
            <td>ACTIONS</td>
		</tr>

	 @foreach($blogs as $b)
		<tr>
			<td>{{$b->id}}</td>
			<td>{{$b->author_name}}</td>
			<td>{{$b->blog_title}}</td>
			<td>{{$b->content}}</td>
			<td>
				<a href="{{route('blog.edit', $b->id)}}">Edit</a> | 
				<a href="{{route('blog.delete', $b->id)}}">Delete</a> | 
				<a href="{{route('blog.details', $b->id)}}">Details</a>
			</td>
		</tr>
	@endforeach

	</table>

</body>
</html>