@extends('layout')

@section('title','create')

@section('content')
    <h2>Login</h2>
    <form action="{{ route('auth') }}" method="Post">
        @csrf
        @method('POST')
        <input type="text" name="email" value="{{old('email')}}" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Submit</button>
    </form>
@endsection
