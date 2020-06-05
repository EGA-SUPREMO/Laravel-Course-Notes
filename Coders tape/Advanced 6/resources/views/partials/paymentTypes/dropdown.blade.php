<select id="payment_type_id" name="payment_type_id">
    @foreach($paymentTypes as $paymentType)
        <option value="{{ $paymentType -> id }}">{{ $paymentType->name }}</option>
    @endforeach
</select>