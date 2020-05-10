<div>
	<label for="name">Name</label>
	<input type="text" name="name" value="{{ old('name') ?? $costumer->name }}" required>
	@error('name') <p>{{ $message }}</p> @enderror
</div>

<div>
	<label for="email">Email</label>
	<input type="text" name="email" value="{{ old('email') ?? $costumer-> email }}" required>
	@error('email') <p>{{ $message }}</p> @enderror
</div>
@csrf