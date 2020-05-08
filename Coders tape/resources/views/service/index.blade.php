@extends('app')

@section('title', 'Services')

@section('content')
	<ul>
	@forelse($services as $service)
		<li>{{ $service -> name }}</li>
	@empty
		No services available
	@endforelse
	</ul>
@endsection