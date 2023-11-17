<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Publicity;

class PublicController extends Controller
{
    public function index()
    {
        // $user_id = Auth()->user()->id;

        // $negocios = User::where('user_id', $user_id)->where('is_store', 1)->get();

        $publicities = Publicity::all();

        $products = Product::all();

        $context = compact('products', 'publicities');

        return view('public.index',$context);

    }

    
}
