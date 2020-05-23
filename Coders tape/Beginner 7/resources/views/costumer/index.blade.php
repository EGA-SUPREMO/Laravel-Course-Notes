<h1>Costumers</h1>

<a href="/costumers/create">add a new costumer</a>
<a href="/costumers/?active=1">active Costumers</a>
<a href="/costumers/?active=0">Inactive Costumers</a>

@forelse($costumers as $costumer)
	<p>
		<a href="/costumers/{{ $costumer -> id }}">{{ $costumer -> name }}</a>({{ $costumer->email }})
	</p>
@empty
	<p>No costumer to show</p>
@endforelse