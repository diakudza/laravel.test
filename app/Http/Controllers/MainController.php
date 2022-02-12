<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('filter')) {
            $tickets = DB::table('tickets')->orderBy('status', 'DESC')->paginate(5)->appends(['filter' => '1']);
        } else {
            $tickets = DB::table('tickets')->paginate(5);
        }

        return view('home', compact('tickets'));
    }

    public function search(Request $request)
    {
        $tickets = Ticket::where('title', 'like', '%' . $request->searchText . '%') -> orWhere('description', 'like', '%' . $request->searchText . '%') ->paginate(5);
        return view('home', compact('tickets'));
    }
}
