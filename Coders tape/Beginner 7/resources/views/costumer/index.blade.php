<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<!--     !!!Remove this in production -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<!-- end of removing -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<h1>Costumers</h1>

<a href="/costumers/create">add a new costumer</a>
<a href="/costumers/?active=1">active Costumers</a>
<a href="/costumers/?active=0">Inactive Costumers</a>

@if(session() -> has('message'))
	<br>
	<strong>Success</strong> {{ session() -> get('message') }}
	
	@if(session() -> has('reflash'))
		{{ session()->keep(['message']) }}
	@endif
@endif

@forelse($costumers as $costumer)
	<p>
		<a href="/costumers/{{ $costumer -> id }}">{{ $costumer -> name }}</a>({{ $costumer->email }})
		This costumer is {{ $costumer -> active }}.
	</p>
@empty
	<p>No costumer to show</p>
@endforelse

<div class="row">
	<div class="col-12 d-flex justify-content-center pt-5">
		{{ $costumers->links() }}
	</div>
</div>
</body>