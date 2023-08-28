<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuperadminController extends Controller
{
    public function index()
    {
        $users = User::all();

        $data = compact('users');

        return view('superadmin.dashboard',$data);
    }

    //metodos para los ajustes del superadmin
    public function settings()
    {
        $user = auth()->user();
        $settings = $user->settings;

        $data = compact('settings');

        return view('superadmin.settings',$data);
    }

    public function updateSettings(Request $request)
    {

        if($request->hasFile('image')){

            $this->validate($request,[
                'image' => 'file',
            ]);

            //Storage::delete('img/fotos/' . Auth::user()->settings->foto_perfil);

            $image = $request->file('image');

            $name = time().$image->getClientOriginalName();

            $image->storeAs('img/fotos/',$name,'public');

            $path = 'img/fotos/'.$name;

            $request['foto_perfil'] = $path;

        }

        $user = auth()->user();
        $settings = $user->settings;

        $settings->update($request->all());

        return redirect()->route('superadmin.ajustes')->with('success','Ajustes actualizados correctamente');
    }
}
