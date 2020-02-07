@extends('main')

@section('title', '| homePage')

@section('content')		
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1 class="display-3">welcome to my blog！</h1>
				<p class="lead">play and play</p>					
				<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</div>
		</div>
	</div> <!-- end of .row -->
			
	<div class="row">
		<div class="col-md-8">

			@foreach($posts as $post)
			<div class="post">
				<h3>{{ $post->title }}</h3>
				<p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
						
				<a class="btn btn-primary btn-lg" href="{{ url('blog/'.$post->slug) }}" role="button">Read more</a>
			</div>					
			<hr>
			@endforeach

		</div>
				
		<div class="col-md-3">
			<h3>Sidebar</h3>		
		</div>
	</div> <!-- end of .row -->
@endsection