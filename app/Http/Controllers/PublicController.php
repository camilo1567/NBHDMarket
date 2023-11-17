<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class PublicController extends Controller
{
    public function index()
    {
        // $user_id = Auth()->user()->id;

        // $negocios = User::where('user_id', $user_id)->where('is_store', 1)->get();

        $products = Product::all();

        $context = compact('products');

        return view('public.index',$context);

    }

    
}
