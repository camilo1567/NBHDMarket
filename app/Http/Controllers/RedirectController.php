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

        }else if($user->hasRole('negocio')){

            return redirect()->route('negocio.dashboard');

        }

        return redirect()->route('dashboard');
    }
}
