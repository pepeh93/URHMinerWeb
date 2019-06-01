<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyAdmin');
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('category.index')->with('message', 'La categoría fue creada correctamente.');
    }

    public function create()
    {
        return view('administrador.category.create');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('administrador.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('message', 'La categoría fue actualizada correctamente.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->forceDelete();
        return redirect()->route('category.index')->with('message', 'La categoría fue eliminada correctamente.');
    }

    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('administrador.category.index', compact('categories'));
    }
}
