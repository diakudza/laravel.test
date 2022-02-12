@extends('layout')

@section('title','home')

@section('content')

    <h2>Show tiket № {{$ticket->id}}</h2><br>
    <h4>Title: {{$ticket->title}}</h4>
    <h4>description: {{$ticket->description}}</h4>
    <h4>date: {{$ticket->created_at}}</h4>
    <a href="{{asset("$ticket->img")}}">download file</a>
    @foreach($comments as $comment)
        <p>{{ \App\Models\User::find($comment->user_id)->name}} - {{ $comment->title }}</p>
    @endforeach
    @if($ticket->status == 1)
    <form action="{{route('comment.store')}}" method="post" >
        @csrf
        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
        <input type="text" name="title" value="{{old('title')}}" placeholder="comment" >
        <button type="submit">Comment</button>
    </form>
    @endif

@endsection
