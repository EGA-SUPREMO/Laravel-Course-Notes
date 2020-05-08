@extends('app')

@section('title', 'Services')

@section('content')

	<form action="/service" method="POST">
		<input type="text" name="name" required>
		@csrf
		<button type="submit">Submit</button>
	</form>
	@error('name') {{ $message }} @enderror
	<ul>
	@forelse($services as $service)
		<li>{{ $service -> name }}</li>
	@empty
		No services available
	@endforelse
	</ul>
@endsection