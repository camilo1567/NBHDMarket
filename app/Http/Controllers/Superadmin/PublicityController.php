<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Publicity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicities = Publicity::all();

        $data = compact('publicities');

        return view('superadmin.publicities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.publicities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'archivo' => 'required|mimes:png,jpeg,jpg',
        ]);

        $request['user_id'] = $user->id;

        $image = $request->file('archivo');

        $name = time().$image->getClientOriginalName();

        $image->storeAs('img/publicidad/',$name,'public');

        $path = 'img/publicidad/'.$name;

        $request['imagen'] = $path;

        Publicity::create($request->all());

        return redirect()->route('superadmin.publicities.index')->with('success','Publicidad creada correctamente');

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
    public function edit(Publicity $publicity)
    {
        $data = compact('publicity');

        return view('superadmin.publicities.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicity $publicity)
    {
        $user = Auth::user();

        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'archivo' => 'mimes:png,jpeg,jpg',
        ]);

        $request['user_id'] = $user->id;

        if ($request->hasFile('archivo')) {
            $image = $request->file('archivo');

            $name = time().$image->getClientOriginalName();

            $image->storeAs('img/publicidad/',$name,'public');

            $path = 'img/publicidad/'.$name;

            $request['imagen'] = $path;
        }

        $publicity->update($request->all());

        return redirect()->route('superadmin.publicities.index')->with('success','Publicidad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicity $publicity)
    {
        $publicity->delete();

        return redirect()->route('superadmin.publicities.index')->with('success','Publicidad eliminada correctamente');
    }

    public function habilitar(Publicity $publicity)
    {
        $publicity->update(['status' => 1]);

        return redirect()->route('superadmin.publicities.index')->with('success','Publicidad habilitada correctamente');
    }

    public function deshabilitar(Publicity $publicity)
    {
        $publicity->update(['status' => 0]);

        return redirect()->route('superadmin.publicities.index')->with('success','Publicidad deshabilitada correctamente');
    }
}
