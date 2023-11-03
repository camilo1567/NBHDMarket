<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('superadmin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'email' => 'required|email|max:50',
            'telefono' => 'required|unique:contacts,telefono'
        ]);

        $contact = Contact::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono
        ]);

        return redirect()->route('superadmin.contacts.index')->with('success', 'Contacto creado con éxito');
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
    public function edit(Contact $contact)
    {
        $data = compact('contact');

        return view('superadmin.contacts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:contacts,nombre,'.$contact->id.'|max:40',
            'apellido' => 'required|string|max:40',
            'email' => 'required|email|max:50',
            'telefono' => 'required|unique:contacts,telefono'
        ]);

        $contact->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono
        ]);

        return redirect()->route('superadmin.contacts.index')->with('success', 'Contacto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('superadmin.contacts.index')->with('success', 'Contacto eliminado con éxito');
    }
}
