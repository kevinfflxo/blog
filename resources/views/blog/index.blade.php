@extends('main')

@section('title', '| Blog')

@section('content')

	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h1> Blog </h1>
		</div>
	</div>

	@foreach ($posts as $post)
	

	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h2>{{ $post->title }}</h2>
			<h5>Published：{{ date('M j, Y', strtotime($post->created_at)) }}</h5>

			<p>{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? "..." : "" }}</p>

			<a href="{{ Route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
			<hr>
		</div>
	</div>
	@endforeach

	<div class="row justify-content-md-center">
		{!! $posts->links() !!}
	</div>
@stop