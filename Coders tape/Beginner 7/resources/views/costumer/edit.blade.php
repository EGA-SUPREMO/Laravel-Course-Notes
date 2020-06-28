<h1>Edit a new costumer</h1>

<form action="/costumers/{{ $costumer->id }}" method="POST" enctype="multipart/form-data">
	@method('PATCH')

	@include('costumer.form')

	<button type="submit">Save</button>
</form>