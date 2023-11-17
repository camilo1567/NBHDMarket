<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index(){
        return view('elements.public.politicas');
    }
    public function condiciones(){
        return view('elements.public.condiciones');
    }
    
}
