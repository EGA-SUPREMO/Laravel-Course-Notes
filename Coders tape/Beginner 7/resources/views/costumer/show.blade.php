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
<h1>Costumer's details</h1>

<a href="/costumers">Back</a>
<br>
<strong>Name:</strong>
<p>{{ $costumer->name }}</p>
<strong>Email:</strong>
<p>{{ $costumer->email }}</p>
<a href="/costumers/{{ $costumer -> id }}/edit"><button>Edit!</button></a>
<form action="/costumers/{{ $costumer -> id }}" method="POST">
	@method('DELETE')
	@csrf
	<button type="submit">Delete</button>
</form>

@if($costumer->image)
	<div class="row">
		<div class="col-12">
			<img src="{{ asset('storage/'.$costumer->image) }}" class="img-thumbnail">
		</div>
	</div>
@endif
</body>