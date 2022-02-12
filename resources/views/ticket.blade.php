@extends('layout')

@section('title','home')

@section('content')
    <h2>Manage of tickets</h2><br>
<table border="1" width="800">
    <tr>
        <td >id</td>
        <td>title</td>
        <td>description</td>
        <td>created at</td>
        <td>change status</td>
        <td>remove</td>
    </tr>

      @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket->id}}</td>
            <td>{{$ticket->title}}</td>
            <td>{{$ticket->description}}</td>
            <td>{{$ticket->created_at}}</td>
            <td>
                <form method="post" action="{{route("ticket.update", ['ticket' => $ticket->id])}}" >
                    @csrf @method('PUT')
                <select name="status">
                    @if ($ticket->status==1)
                        <option value="1" selected>Open</option>
                        <option value="0">Close</option>
                    @else
                        <option value="1" >Open</option>
                        <option value="0" selected>Close</option>
                    @endif
                </select>
                    <button type="submit">Update</button>
                </form>
            </td>
            <td>
                <form method="post" action="{{route("ticket.destroy", ['ticket' => $ticket->id])}}" >
                    @csrf @method("DELETE")
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
      @endforeach
</table>
    @if (count($tickets))
                {{ $tickets -> links() }}
    @endif
@endsection
