<?php

namespace App\Http\Controllers\Negocio;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $user_id = Auth()->user()->id;

        $products = Product::where('user_id', $user_id)->get();

        return view('negocio.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('negocio.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'nombre' => 'required',
            'precio' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'descripcion' => 'required',
            'archivo' => 'required|mimes:png,jpeg,jpg'
        ]);

        $request['user_id'] = $user->id;

        $image = $request->file('archivo');

        $name = time().$image->getClientOriginalName();

        $image->storeAs('img/productos/',$name,'public');

        $path = 'img/productos/'.$name;

        $request['imagen'] = $path;

        Product::create($request->all());

        return redirect()->route('negocio.products.index')->with('success', 'Producto agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = compact('product');

        return view('negocio.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Product $product)
    {
        $user = Auth::user();

        $this->validate($request, [
            'nombre' => 'required',
            'precio' => 'required|integer',
            'cantidad' => 'required|integer',
            'descripcion' => 'required',
            'archivo' => 'mimes:png,jpeg,jpg'
        ]);

        $request['user_id'] = $user->id;

        if ($request->hasFile('archivo')) {
            $image = $request->file('archivo');

            $name = time().$image->getClientOriginalName();

            $image->storeAs('img/productos',$name,'public');

            $path = 'img/productos/'.$name;

            $request['imagen'] = $path;
        }

        $product->update($request->all());

        return redirect()->route('negocio.products.index')->with('success', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('negocio.products.index')->with('success', 'Producto eliminado con éxito');
    }
}
