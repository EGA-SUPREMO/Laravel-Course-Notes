@extends('app')

@section('title', 'Available Payment Types')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Available Payment Types
        </div>
        <x-partials.paymentType.list />
    </div>
@endsection
