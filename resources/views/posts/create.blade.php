@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}

	<!-- select2 css -->
	{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css') !!}
@endsection

@section('content')
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h1>Create New Post</h1>			
			<hr>
			
			<!-- encoding type => enctype -->
			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
			    {{ Form::label('title', 'Title:') }}
			    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

			    {{ Form::label('slug', 'Slug：') }}
			    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
				
				{{ Form::label('category_id', 'Category:') }}
				<select class="form-control" name="category_id">
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control js-example-responsive" name="tags[]" multiple="multiple">
					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>
				
				<div class="row form-spacing-top">{{ Form::label('featured_image', 'Upload Featured Image:') }}</div>
				<div class="row">{{ Form::file('featured_image') }}</div>
				

			    {{ Form::label('body', 'Post Body:') }}
			    {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block',
			     'style' => 'margin-top:20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}

	<!-- select2 js -->
	{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js') !!}

	<script type="text/javascript">
		$(".js-example-responsive").select2({
	    	width: 'resolve' // need to override the changed default
		});
	</script>
@endsection

