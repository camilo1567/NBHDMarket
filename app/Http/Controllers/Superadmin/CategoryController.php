<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('superadmin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:categories,nombre|string|max:255',
        ]);

        Category::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('superadmin.categories.index')->with('success', 'Categoria creada con éxito');
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
    public function edit(Category $category)
    {
        $data = compact('category');

        return view('superadmin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:categories,nombre,'.$category->id.'|string|max:255',
        ]);

        $category->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('superadmin.categories.index')->with('success', 'Categoria actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('superadmin.categories.index')->with('success', 'Categoria eliminada con éxito');
    }
}
