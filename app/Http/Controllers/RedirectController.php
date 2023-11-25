<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function toDashboard()
    {
        $user = auth()->user();

        if($user->hasRole('superadmin')){

            return redirect()->route('superadmin.dashboard');

        }

        if($user->hasRole('negocio')){

            return redirect()->route('negocio.dashboard');

        }

        if($user->hasRole('cliente')){

            return redirect()->route('cliente.dashboard');

        }

        return redirect()->route('dashboard');
    }
}
