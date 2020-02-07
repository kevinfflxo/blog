@extends('main')

@section('title', '| All Categories')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<td>#</td>
						<td>Name</td>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- .end of col-md-8 -->

		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					{!! Form::open(['route' => 'tags.store']) !!}
					<h4>New Tag</h4>

					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}

				{!! Form::close() !!}
				</div>
				
			</div>
		</div>
	</div>
@endsection