@extends('template')

@section('title')
	Meu título feliz
@stop

@section('content')

	<h1>Blog Admin</h1>
	
	<p><a href="{{route('admin.posts.create')}}" class="btn btn-success">Create New Post</a></p>

	<table class="table">

	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Action</th>
	</tr>

	@foreach($posts as $post)
		<tr>
			<td>{{$post->id}}</td>
			<td>{{$post->title}}</td>
			<td>
				<a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="btn btn-default">edit</a>
				<a href="{{ route('admin.posts.destroy', ['id' => $post->id]) }}" class="btn btn-danger">destroy</a>
			</td>
			
			
		</tr>
	@endforeach

	</table>

	{!!$posts->render()!!}

@stop