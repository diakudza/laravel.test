@extends('layout')

@section('title','home')

@section('content')
    <h2>List of tickets</h2><br>
    <table border="1" width="800">
        <tr>
            <td>id</td>
            <td>title</td>
            <td>description</td>
            <td>created at</td>
            <td><a href="?filter=1"> status</a></td>
        </tr>
        @foreach($tickets as $ticket)

            <tr>
                <td><a href="{{route('ticket.show',['ticket' => $ticket->id])}}"> {{$ticket->id}}</a></td>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->description}}</td>
                <td>{{$ticket->created_at}}</td>
                <td>@if ($ticket->status == 1) Open @else Close @endif </td>
            </tr>
        @endforeach
    </table>
    @if (count($tickets))
        {{ $tickets -> links() }}
    @endif

    <a href="{{ route('ticket.create')}}">New ticket</a><br>
    @auth()
    @if(Auth::user()->is_admin==1)
        <a href="{{ route('ticket.index')}}">Show all tickets</a><br>
    @endif
    @endauth
@endsection

