@extends('template')

@section('title')
	Meu título feliz
@stop

@section('content')

<h1>Blog</h1>

	@foreach($posts as $post)
		<h2> ({{$post->id}}) Title: {{$post->title}} <i>{{$post->created_at->format('d/m/Y')}}</i> </h2>
		<p> Content: {{$post->content}}</p>

		<p><b>Tags:</b></p>

		<ul>
		@foreach($post->tags as $tag)

			<li>{{$tag->name}}</li>

		@endforeach
		</ul>

		<h3>Comments</h3>
		@foreach($post->comments as $comment)

		<p><b>Nome:</b>	{{$comment->name}}</p>
		<p><b>E-mail:</b>	{{$comment->email}}</p>
		<p><b>Comentário:</b>	{{$comment->comment}}</p>

		@endforeach
		<hr>
	@endforeach

@stop