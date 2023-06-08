<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function index()
    {
        $users = User::all();

        $data = compact('users');

        return view('superadmin.dashboard',$data);
    }
}
