<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

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
        $this->validate($request, [
            'nombre' => 'required|string|max:40',
            'precio' => 'required|string|max:40',
            'cantidad' => 'required|integer|min:1',
            'descripción' => 'required',
            'imagen' => 'required'
        ]);

        $product = Product::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('negocio.products.index', auth()->user()->name)->with('success', 'Producto agregado con éxito');
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
        $this->validate($request, [
            'nombre' => 'required|unique:contacts,nombre,'.$product->id.'|max:40',
            'precio' => 'required|string|max:40',
            'cantidad' => 'required|integer|min:1',
            'descripción' => 'required'
        ]);

        $product->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'descripción' => $request->descripcion
        ]);

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
