<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Nbhdmarket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NbhdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        // $tickets = $this->totalByTickets();

        //dd($tickets);

        // $data = compact('users','tickets');

        return view('superadmin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $nbhd = Nbhdmarket::find($id);

        $context = compact('nbhd');

        return view('superadmin.info.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $nbhd = Nbhdmarket::find($id);

        $this->validate($request, [
            
            'correo' => 'required|email|',
            'telefono' => 'required',
            'direccion' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required',

        ]);

        $nbhd->update($request->all());

    

        return redirect()->route('superadmin.info.edit', $nbhd->id)->with('success', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //metodos para los ajustes del superadmin
    // public function info()
    // {
    //     $user = auth()->user();
    //     $nbhd = $user->nbhd;

    //     $data = compact('nbhd');

    //     return view('superadmin.info',$data);
    // }

    // public function updateInfo(Request $request)
    // {

    //     $user = auth()->user();
    //     $nbhd = $user->nbhd;

    //     $nbhd->update($request->all());

    //     return redirect()->route('superadmin.info')->with('success','Ajustes actualizados correctamente');
    // }
}
