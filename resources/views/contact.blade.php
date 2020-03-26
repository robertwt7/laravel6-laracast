@extends('layout')
@section('head')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="wrapper">
    <form
    method="POST"
    class="bg-white p-6 rounded"
    action="/contact">

        @csrf
        <div class="mb-5">
            <label
            for="email"
            class="block text-xs uppsercase"
            >
                Email Address
            </label>
            <input type="text" name="email" id="email" class="border px-2 py-1 text-sm">

            @error('email')
                <div class="text-red-500 text-xs">{{$message}}</div>
            @enderror

            @if (session('message'))
                <p class="text-green-500 mt-2 text-xs">
                    {{session('message')}}
                </p>
            @endif
            <button type="submit" class="bg-blue-500 py-2">Submit</button>
        </div>
    </form>
</div>
@endsection

