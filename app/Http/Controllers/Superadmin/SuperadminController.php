<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuperadminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $tickets = $this->totalByTickets();

        //dd($tickets);

        $data = compact('users','tickets');

        return view('superadmin.dashboard',$data);
    }

    public function totalByTickets()
    {
        $tickets = Ticket::all();

        $abiertos = $tickets->where('status',0)->count();
        $pendientes = $tickets->where('status',1)->count();
        $enProgreso = $tickets->where('status',2)->count();
        $cerrados = $tickets->where('status',3)->count();

        //$total = $tickets->count();

        // $ticketsTotal = [
        //     'abiertos' => ['cantidad' => $abiertos,'porcentaje' => round(($abiertos * 100) / $total,2)],
        //     'pendientes' => ['cantidad' => $pendientes,'porcentaje' => round(($pendientes * 100) / $total,2)],
        //     'enProgreso' => ['cantidad' => $enProgreso,'porcentaje' => round(($enProgreso * 100) / $total,2)],
        //     'cerrados' => ['cantidad' => $cerrados,'porcentaje' =>round(($cerrados * 100) / $total,2)],
        // ];

         $ticketsTotal = [
            'abiertos' => $abiertos ,
            'pendientes' => $pendientes ,
            'enProgreso' => $enProgreso,
            'cerrados' => $cerrados ,
        ];

        return $ticketsTotal;
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
