@extends('app')

@section('title', 'Make your oroder')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Make your order before its too late!!!!!!1
        </div>
        <form>
            <strong>QUICK CHOOSE ONE!!!!!!!!!!!!!!!!!!!!!!!!!!</strong>
            <x-partials.paymentType.dropdown field="you" />
        </form>
    </div>
@endsection
