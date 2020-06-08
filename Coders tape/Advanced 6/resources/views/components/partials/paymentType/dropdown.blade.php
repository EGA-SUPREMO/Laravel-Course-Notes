<select id="{{ $field ?? 'payment_type_id' }}" name="{{ $field ?? 'payment_type_id' }}">
    @foreach($paymentTypes as $paymentType)
        <option value="{{ $paymentType -> id }}">{{ $paymentType->name }}</option>
    @endforeach
</select>
