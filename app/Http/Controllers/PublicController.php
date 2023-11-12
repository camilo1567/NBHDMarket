<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {

        $products = Product::all();

        $context = compact('products');

        return view('public.index',$context);

    }
}
