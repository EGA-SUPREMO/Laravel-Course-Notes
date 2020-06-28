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

<div class="form-group d-flex flex-column">
	<label for="Image">Profile Image</label>
	<input type="file" name="image" class="py-2">
	@error('image') <p>{{ $message }}</p> @enderror
</div>
@csrf