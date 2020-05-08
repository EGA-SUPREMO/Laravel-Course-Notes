<h1>Costumers</h1>

@forelse($costumers as $costumer)
	<p><strong>{{ $costumer -> name }}</strong>({{ $costumer->email }})</p>
@empty
	<p>No costumer to show</p>
@endforelse