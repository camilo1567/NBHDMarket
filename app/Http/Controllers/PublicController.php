<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Message;
use App\Models\User;
use App\Models\Product;
use App\Models\Publicity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function product(Product $product)
    {
        $context = compact('product');

        return view('public.product',$context);

    }

    public function message(Request $request,Product $product)
    {
        $request->validate([
           'message' => 'max:255'
        ]);

        $message = Message::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $product->user_id,
            'message' => $request->message,
            'img_path' => $product->imagen
        ]);

        return redirect()->back()->with('success', 'Mensaje enviado');
    }

    public function negocios(Request $request)
    {
        $negocios = User::where('is_store', 1)->when($request->filled('q') && $request->q != 4, function ($q) use ($request){

            $q->where('name', 'LIKE', "%".$request->q."%" );

        })->paginate(10);

        $context = compact('negocios');

        return view('public.negocios',$context);
    }

    public function negocio($id)
    {

        $negocio = User::where('id', $id)->first();

        $context = compact('negocio');

        return view('public.negocio',$context);
    }

    public function comentario(Request $request,Product $product)
    {
        $request->validate([
            'comentario' => 'max:255'
        ]);

        Comment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'comentario' => $request->comentario,
        ]);

        return redirect()->back()->with('success', 'Comentario enviado');

    }

}
