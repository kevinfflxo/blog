@extends('main')

@section('title', '| Register')

@section('content')
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			{!! Form::open() !!}
				<!-- we also need to confirm the password and laravel expects you to be able to confirm the password -->
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::label('email', 'Email:', ['class' => 'form-spacing-top']) }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}

				{{ Form::label('password', 'Password:', ['class' => 'form-spacing-top']) }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				
				{{ Form::label('password_confirmation', 'Confirm Password:', ['class' => 'form-spacing-top']) }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}

				{{ Form::submit('Register', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}							
			{!! Form::close() !!}
		</div>
	</div>
@stop