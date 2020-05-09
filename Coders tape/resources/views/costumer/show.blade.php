<h1>Costumer's details</h1>

<a href="/costumers">Back</a>
<br>
<strong>Name:</strong>
<p>{{ $costumer->name }}</p>
<strong>Email:</strong>
<p>{{ $costumer->email }}</p>
<a href="/costumers/{{ $costumer -> id }}/edit">Edit!</a>