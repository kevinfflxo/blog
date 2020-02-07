@extends('main')

@section('title', "| $tag->name Tag")
<!-- 單引號會把裡面的內容完全當字串輸出
雙引號如果遇到$開頭的變數會去解析變數 -->

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1> {{ $tag->name }} tag <small class="text-muted">{{ $tag->posts()->count() }} Post(s)</small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary float-right btn-block" style="margin-top:10px;">Edit</a>
		</div>
		<div class="col-md-2">
			{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) !!}
				{{ Form::submit('delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:10px;']) }}
			{!! Form::close() !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach( $tag->posts as $post )
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>
								@foreach( $post->tags as $tag)
									<span class="badge badge-secondary">{{ $tag->name }}</span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-light btn-sm">view</a></td>
						</tr>
					@endforeach
				</tbody>
				
			</table>
		</div>
	</div>
	

@endsection