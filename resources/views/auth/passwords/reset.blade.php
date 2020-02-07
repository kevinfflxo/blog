@extends('main')

@section('title', '| Forgot my Password')

@section('content')
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Reset Password</div>

				<div class="card-body">
					
					{!! Form::open(['url' => 'password/reset', 'method' => 'POST']) !!}
						{{ Form::hidden('token', $token) }}
						<!-- have URL token -->

						{{ Form::label('email', 'Email Address:') }}
						{{ Form::email('email', $email, ['class' => 'form-control']) }}

						
						{{ Form::label('password', 'New Password:', ['class' => 'form-spacing-top']) }}
						{{ Form::password('password', ['class' => 'form-control']) }}

						{{ Form::label('password_confirmation', 'Confirm New Password:', ['class' => 'form-spacing-top']) }}
						{{ Form::password('password_confirmation', ['class' => 'form-control']) }}

						{{ Form::submit('Reset Password', ['class' => 'btn btn-primary form-spacing-top']) }}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>


@stop
