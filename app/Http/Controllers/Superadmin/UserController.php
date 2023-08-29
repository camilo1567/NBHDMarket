<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserSetting;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$users = User::all();

        $users = User::when($request->filled('q'), function ($q) use ($request){

                $q->where('name', 'LIKE', "%".$request->q."%" )
                ->orWhere('email', 'LIKE', "%".$request->q."%");

        })->paginate(15);

        $data = compact('users');

        return view('superadmin.users.index', $data);
    }

    /**
     * Display a listing of the resource.
    */
    public function clientIndex(Request $request)
    {
        $users = User::role('cliente')->when($request->filled('q'), function ($q) use ($request){

            $q->where('name', 'LIKE', "%".$request->q."%" )
            ->orWhere('email', 'LIKE', "%".$request->q."%");

        })->paginate(15);

        $data = compact('users');

        return view('superadmin.users.index', $data);
    }

        /**
     * Display a listing of the resource.
    */
    public function negocioIndex(Request $request)
    {
        $users = User::role('negocio')->when($request->filled('q'), function ($q) use ($request){

            $q->where('name', 'LIKE', "%".$request->q."%" )
            ->orWhere('email', 'LIKE', "%".$request->q."%");

        })->paginate(15);

        $data = compact('users');

        return view('superadmin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:255|confirmed',
            'rol' => 'required|integer|between:1,2'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($request->rol == 1){

            $user->assignRole('negocio');

        }
        if($request->rol == 2){

            $user->assignRole('cliente');

        }

        UserSetting::create([
            'user_id' => $user->id,
        ]);

        return redirect()
            ->route('superadmin.users.index')
            ->with('success', "Usuario {$user->name} creado con exito");
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
    public function edit(User $user)
    {
        $data = compact('user');

        return view('superadmin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required|string|min:3|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
        ]);

        if($request->password != null){

            $this->validate($request,[
                'password' => 'required|string|min:8|max:255|confirmed',
            ]);

        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if($request->password != null){

            $user->update([
                'password' => Hash::make($request->password),
            ]);

        }

        return redirect()
            ->route('superadmin.users.index')
            ->with('success', "Usuario {$user->name} actualizado con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('superadmin.users.index')
            ->with('success', "Usuario {$user->name} eliminado con exito");
    }
}
