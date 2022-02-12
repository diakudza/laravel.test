@extends('layout')

@section('title','create')

@section('content')
    <h2>Create ticket</h2>
    <form action="{{route('ticket.store')}}" enctype="multipart/form-data"  method="Post">
        @csrf
        @method('POST')
        <input type="text" name="title" value="{{old('title')}}" placeholder="title">
        <input type="text" name="description" value="{{old('description')}}" placeholder="description">
        <input type="file" name="file">
        <button type="submit">Submit</button>
    </form>
@endsection
