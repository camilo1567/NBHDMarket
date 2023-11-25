<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index ()
    {

        $contactos = Contact::all();

        return view('elements.about',compact('contactos'));
    }
}
