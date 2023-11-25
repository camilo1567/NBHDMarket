<?php

namespace App\Http\Controllers\Negocio;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = Auth()->user()->id;

        $tickets = Ticket::when($request->filled('q') && $request->q != 4, function ($q) use ($request){

            $q->where('status',$request->q);

        })->where('user_id', $user_id)->paginate(15);

        $data = compact('tickets');

        return view('negocio.tickets.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('negocio.tickets.create');
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
            'type' => 'required',
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

        return redirect()->route('negocio.tickets.index')->with('success','Ticket creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $data = compact('ticket');

        return view('negocio.tickets.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $today = Carbon::now();

        if($request->status == 3){
            $this->validate($request,[
                'respuesta' => 'required|string|max:255',
                'status' => 'required|numeric',
            ]);

            $ticket->update([
                'respuesta' => $request->respuesta,
                'status' => $request->status,
                'fecha_cierre' => $today
            ]);
        }

        if($request->status < 3){
            $this->validate($request,[
                'status' => 'required|numeric',
            ]);

            $ticket->update(['status' => $request->status]);
        }


        return redirect()->route('negocio.tickets.index')->with('success','Ticket actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
