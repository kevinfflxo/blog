@extends('main')

@section('title', '| contact')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>contact me</h1>
			<hr>

			{{ Form::open(['route' => 'contact', 'method' => 'post']) }}
				<div class="form-group">
					<label name="label">Email:</label>
					<input id="email" name="email" class="form-control">
				</div>
				
				<div class="form-group">
					<label name="subject">subject:</label>
					<input id="subject" name="subject" class="form-control">
				</div>
				
				<div class="form-group">
					<label name="label">Message:</label>
					<textarea id="message" name="message" class="form-control">scan something</textarea>
				</div>
				
				<input type="submit" value="Send Message" class="btn btn-primary">
			{{ Form::close() }}
		</div>			
	</div> <!-- end of .row -->
			
@endsection