@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
	<!-- select2 css -->
	{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css') !!}
@endsection

@section('content')
	<div class="row">	
		<div class="col-md-7">
			<!-- GET：The GET method requests a representation of the specified resource. Requests using GET should only retrieve data. -->
			<!-- POST：The PUT method replaces all current representations of the target resource with the request payload. -->
			<!-- PATCH：The PATCH method is used to apply partial modifications to a resource. -->
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, ['class' => 'form-control form-control-lg']) }}

				{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
				{{ Form::text('slug', null, ['class' => 'form-control']) }}
				<!-- make sure that this name corresponds with the column name in the database
				and thats how laravel knows that how to match up the items
				second parameter in a text field is the default value, laravel will handle that for us -->
	
				{{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
				{{ Form::select('category_id', $cats, null, ['class' => 'form-control']) }}

				{{ Form::label('tags', 'Tags:') }}
				{{ Form::select('tags[]', $tags, null, ['class' => 'form-control js-example-responsive', 'multiple' => 'multiple']) }}
				
				{{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
				{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>

		<div class="col-md-5">
			<div class="card border-secondary mb-3" style="background-color:#F0F0F0;">
				<div class="card-body">
					<dl class="row">
  						<dt class="col-sm-6">Created At：</dt>
  						<dd class="col-sm-6">{{ date('M j, Y h:ia', strtotime($post -> created_at)) }}</dd>
						
						<dt class="col-sm-6">Last Updated：</dt>
						<dd class="col-sm-6">{{ date('M j, Y h:ia', strtotime($post -> updated_at)) }}</dd>
					</dl>

					<hr>
					
					<div class="row">
						<div class="col-sm-6">
							{{ Html::linkRoute('posts.show', 'Cancel', array($post -> id), array('class' => 'btn btn-secondary btn-block')) }}											
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
							<!-- {{ Html::linkRoute('posts.update', 'Save Changes', array($post -> id), array('class' => 'btn btn-success btn-block')) }} -->
						</div>
					</div>
				</div> <!-- end of .card-body -->
			</div> <!-- end of .card -->
			{!! Form::close() !!}
		</div> <!-- end of .col-md-5 -->
	</div> <!-- end of .row -->
@endsection

@section('scripts')
	<!-- select2 js -->
	{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js') !!}

	<script type="text/javascript">
		$(".js-example-responsive").select2({
	    	width: 'resolve' // need to override the changed default
		});
	</script>

@endsection