@extends('main')

@section('title', "| $post->title")
<!-- this is actually a php item -->
<!-- double quotation marks can actually add the variable directly and this is just a PHP thing, single quotations it doesn't do that, doesn't literally-->

@section('content')		
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<img src="{{ asset('images/'.$post->image) }}" height="400" width="800"/>
			<h1> {{ $post->title }} </h1>
			<p> {{ $post->body }} </p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 mx-auto">
			<h3 class="comments-title">

				<!-- comment icon -->
				<svg id="i-msg" viewBox="0 0 32 32" width="32" height="32" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
			    	<path d="M2 4 L30 4 30 22 16 22 8 29 8 22 2 22 Z" />
				</svg>
				<!-- end of comment icon -->
				{{ $post->comments->count()}}<space>Comments</space>
			</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">				
						<img src="{{ "https://www.gravatar.com/avatar/".strtolower(trim($comment->email))."?s=50&d=mp" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('M nS, Y - g:i a', strtotime($comment->created_at)) }}</p>
						</div>		
					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="mx-auto col-md-8">
			<!-- x中間, l左, R右 -->	
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'post']) }}
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "name:") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email', "email:") }}
						{{ Form::email('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-12">
						{{ Form::label('comment', "comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
						{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block form-spacing-top']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection