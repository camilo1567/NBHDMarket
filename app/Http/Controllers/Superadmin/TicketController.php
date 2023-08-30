<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = Ticket::when($request->filled('q') && $request->q != 4, function ($q) use ($request){

            $q->where('status',$request->q);

        })->paginate(15);

        $data = compact('tickets');

        return view('superadmin.tickets.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request['user_id'] = $user->id;

        $this->validate($request,[
            'asunto' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        if($request->hasFile('archivo')){

            //Storage::delete('tickets/' . Auth::user()->settings->foto_perfil);

            $file = $request->file('archivo');

            $name = time().$file->getClientOriginalName();

            $file->storeAs('tickets/',$name,'public');

            $path = 'tickets/'.$name;

            $request['file'] = $path;

        }

        Ticket::create($request->all());

        return redirect()->route('superadmin.tickets.index')->with('success','Ticket creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $data = compact('ticket');

        return view('superadmin.tickets.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {

        if($request->status == 3){
            $this->validate($request,[
                'response' => 'required|string|max:255',
                'status' => 'required|numeric',
            ]);

            $ticket->update(['response' => $request->response,'status' => $request->status]);
        }

        if($request->status < 3){
            $this->validate($request,[
                'status' => 'required|numeric',
            ]);

            $ticket->update(['status' => $request->status]);
        }


        return redirect()->route('superadmin.tickets.index')->with('success','Ticket actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
