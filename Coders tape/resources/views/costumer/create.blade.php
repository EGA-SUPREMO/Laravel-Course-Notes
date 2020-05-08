<h1>add a new costumer</h1>

<form action="/costumers" method="POST">
	<div>
		<label for="name">Name</label>
		<input type="text" name="name" value="{{ old('name') }}" required>
		@error('name') <p>{{ $message }}</p> @enderror
	</div>
	<div>
		<label for="email">Email</label>
		<input type="text" name="email" value="{{ old('email') }}" required>
		@error('email') <p>{{ $message }}</p> @enderror
	</div>
	@csrf

	<button type="submit">add costumer</button>
</form>