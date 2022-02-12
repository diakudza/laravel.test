<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('filter')){
            $tickets = DB::table('tickets')->orderBy('status','DESC')->paginate(5);
        } else {
            $tickets = DB::table('tickets')->paginate(5);
        }

        return view('ticket', compact('tickets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        if($request->hasFile('file')){

            $data['img']=$request->file('file')->store("img");
        }

        Ticket::create($data);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $comments= $ticket->comments;
        return view('ticketone', compact('ticket','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "EDIT";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket=Ticket::find($id);
        $ticket->update(['status'=>$request->status]);
        return redirect()->route('ticket.index')->with('message', "Ticket was updated");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket=Ticket::find($id);
        $ticket->delete();
       return redirect()->route('ticket.index')->with('message','ticket was deleted');
    }
}
