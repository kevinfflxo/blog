@extends('main')

@section('title', '| view Post')

@section('content')
	<div class="row">
		<div class="col-md-7">
			<h1>{{ $post -> title }}</h1>
			<p class='lead'>{{ $post -> body }}</p>

			<hr>

			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="badge badge-secondary">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div id="backend-comments">
				<h3>Comments <small>{{ $post->comments->count() }} total</small></h3>
			</div>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th width="120px"></th>
					</tr>
				</thead>

				<tbody>
					@foreach($post->comments as $comment)
					<tr>						
						<td>{{ $comment->name }}</td>
						<td>{{ $comment->email }}</td>
						<td>{{ $comment->comment }}</td>
						<td>
							<a href="{{ route("comments.edit", $comment->id) }}" class="btn btn-light btn-sm"><img src="https://png.icons8.com/color/24/000000/multi-edit.png" style="float: right;" /></a>
						
							<a href="#" class="btn btn-light btn-sm"><img src="https://png.icons8.com/ios/24/000000/waste-filled.png" /></a>
						</td>			
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-5">
			<div class="card border-secondary mb-3" style="background-color:#F0F0F0;">
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-4">URL Slug：</dt>
  						<dd class="col-sm-8"><a href="{{ route('blog.single', $post->slug) }}">{{ url('blog/'.$post -> slug) }}</a></dd>

  						<dt class="col-sm-4">Category：</dt>
  						<dd class="col-sm-8">{{ $post->category->name }}</dd>

						<!-- url(''):base default url outputs -->
  						<dt class="col-sm-6">Created At：</dt>
  						<dd class="col-sm-6">{{ date('M j, Y h:ia', strtotime($post -> created_at)) }}</dd>
						
						<dt class="col-sm-6">Last Updated：</dt>
						<dd class="col-sm-6">{{ date('M j, Y h:ia', strtotime($post -> updated_at)) }}</dd>
					</dl>

					<hr>
					
					<div class="row">
						<div class="col-sm-6">
							{{ Html::linkRoute('posts.edit', 'Edit', array($post -> id), array('class' => 'btn btn-primary btn-block')) }}											
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

								{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}

							{!! Form::close() !!}
						</div>

						
					</div>

					<div class="row">
						<div class="col-md-12">
							{{ Html::linkRoute('posts.index', '<< show all posts', [], array('class' => 'btn btn-light btn-block')) }}	
						</div>
					</div>
				</div> <!-- end of .card-body -->
			</div> <!-- end of .card -->
		</div> <!-- end of .col-md-5 -->
	</div> <!-- end of .row -->
	
	
	
	
@endsection