<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $data = compact('category');

        return view('superadmin.subcategories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        $data = compact('category');

        return view('superadmin.subcategories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Category $category)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:subcategories,nombre|string|max:255',
        ]);

        Subcategory::create([
            'nombre' => $request->nombre,
            'category_id' => $category->id
        ]);

        return redirect()->route('superadmin.subcategories.index', $category)->with('success', 'Subcategoria creada con éxito');
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
    public function edit(Category $category, Subcategory $subcategory)
    {
        $data = compact('category','subcategory');

        return view('superadmin.subcategories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Category $category,Subcategory $subcategory)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255|unique:subcategories,nombre,'.$subcategory->id,
        ]);

        $subcategory->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('superadmin.subcategories.index', $category)->with('success', 'Subcategoria actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('superadmin.subcategories.index',$category)->with('success', 'Subcategoria eliminada con éxito');
    }
}
