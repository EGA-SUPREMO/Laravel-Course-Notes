@extends('app')

@section('title', 'Available Payment Types')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Available Payment Types
        </div>
        <x-partials.payment-type.list />
    </div>
    <x-payment-type title-list="My ugly list" :extra="$extraContent" class="card">
		<x-slot name="info">be u, not me</x-slot>
		<x-slot name="miniinfo">My list for you!</x-slot>

		addicional content here only for you!
	</x-payment-type>
@endsection
