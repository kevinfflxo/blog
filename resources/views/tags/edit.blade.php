@extends('main')

@section('title', '| Edit Tag')

@section('content')

	{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'put']) }}
		{{ Form::label('name', 'Title:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}

		{{ Form::submit('save change', ['class' => 'btn btn-success form-spacing-top'])}}
	{{ Form::close() }}

@endsection