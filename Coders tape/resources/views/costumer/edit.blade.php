<h1>Edit a new costumer</h1>

<form action="/costumers/{{ $costumer->id }}" method="POST">
	<div>
		<label for="name">Name</label>
		<input type="text" name="name" value="{{ $costumer->name }}" required>
		@error('name') <p>{{ $message }}</p> @enderror
	</div>
	<div>
		<label for="email">Email</label>
		<input type="text" name="email" value="{{ $costumer-> email }}" required>
		@error('email') <p>{{ $message }}</p> @enderror
	</div>
	@csrf

	<button type="submit">Save</button>
</form>