<ul>
    @foreach($paymentTypes as $paymentType)
        <li>{{ $paymentType->name }}</li>
    @endforeach
</ul>
