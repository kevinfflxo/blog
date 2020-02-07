@extends('main')

@section('title', '| Forgot my Password')

@section('content')
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Reset Password</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{!! Form::open(['url' => 'password/email', 'method' => 'POST']) !!}
						{{ Form::label('email', 'Email Address:') }}
						{{ Form::email('email', null, ['class' => 'form-control']) }}

						{{ Form::submit('Reset Password', ['class' => 'btn btn-primary form-spacing-top']) }}
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
@stop