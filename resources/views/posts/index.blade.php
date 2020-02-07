@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>all Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-margin">Create Post</a>	
			<!-- route allow us to basically pass in a named route and 
			then it will automatically generate the URL from than named route -->
		</div>
	
	</div><!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
			  	<thead>
				    <tr>
				      	<th scope="col">#</th>
				      	<th scope="col">Title</th>
				      	<th scope="col">Body</th>
				      	<th scope="col">Created At</th>
				      	<th scope="col"></th>
				    </tr>
			  	</thead>
			  	<tbody>
			    	@foreach ($posts as $post)
						<tr>
					      	<th scope="col">{{ $post -> id }}</th>
					      	<td scope="col">{{ $post -> title }}</td>
					      	<td scope="col">
					      		{{ substr($post -> body, 0, 50) }}
					      		{{ strlen($post -> body) > 50 ? "..." : "" }}
					      	</td>
					      	<td scope="col">{{ date('M j, Y', strtotime($post -> created_at)) }}</td>
					      	<td>
						      	<a href="{{ route('posts.show', $post -> id) }}" class="btn btn-default btn-sm">View</a>
						      	<a href="{{ route('posts.edit', $post -> id) }}" class="btn btn-default btn-sm">edit</a>
						    </td>
				    	</tr>
			    	@endforeach
			  	</tbody>
			</table>

			<div class="row justify-content-around">
				{!! $posts->links() !!}
				<!-- that it doesn't escape the URLs and stuff the links that are in -->
			</div>
		</div>
	</div>

	
@endsection