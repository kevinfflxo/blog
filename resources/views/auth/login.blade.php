@extends('main')

@section('title', '| login')

@section('content')
	<!-- need to make sure that you have CSRF protection laravel will check that -->
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			{!! Form::open() !!}
				<!-- have to have an email field and hava to have a password field, and then if we're going to do remember me functionality, we need a checkbox for remember me-->
				<!-- make sure our names correspond with the column names in our database -->
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}

				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				
				<br>
				{{ Form::checkbox('remember') }}{{ Form::label('remember', 'Remember Me') }}

				<br>
				{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
				
				{{ Html::linkRoute('register', 'register') }}
				<p><a href="{{ url('password/reset') }}">Forgot My Password</a>

			{!! Form::close() !!}
		</div>
	</div>
@stop