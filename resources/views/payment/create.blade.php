@extends('layouts.app')

@section('content')

<form action="/payment" method="POST">
    @csrf
    <button type="submit" class="">Create Payment</button>
</form>

@endsection
