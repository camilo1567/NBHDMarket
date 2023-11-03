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
        //
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
    public function edit(NbhdMarket $nbhd)
    {
        $data = compact('info');

        return view('superadmin.info.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NbhdMarket $nbhd)
    {
        $this->validate($request, [
            
            'correo' => 'required|email|max:50',
            'telefono' => 'required|unique:contacts,telefono',
            'direccion' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required',

        ]);

        $nbhd->update([
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
        ]);

    

        return redirect()->route('superadmin.info.index')->with('success', 'Contacto actualizado con éxito');
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
    //     $settings = $user->settings;

    //     $data = compact('settings');

    //     return view('superadmin.info',$data);
    // }

    // public function updateInfo(Request $request)
    // {

    //     $user = auth()->user();
    //     $settings = $user->settings;

    //     $settings->update($request->all());

    //     return redirect()->route('superadmin.ajustes')->with('success','Ajustes actualizados correctamente');
    // }
}
