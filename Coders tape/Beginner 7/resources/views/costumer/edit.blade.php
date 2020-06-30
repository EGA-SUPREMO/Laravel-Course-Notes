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

<h1>Edit a new costumer</h1>

<form action="/costumers/{{ $costumer->id }}" method="POST" enctype="multipart/form-data">
	@method('PATCH')

	@include('costumer.form')

	<button type="submit">Save</button>
</form>
</body>