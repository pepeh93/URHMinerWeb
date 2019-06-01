<?php

namespace App\Http\Controllers;

use App\Pool;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyAdmin', ['except' => ['getPools']]);
    }

    public function getPools()
    {
        $pools = Pool::orderBy('name')->get();
        return view('pools', compact('pools'));
    }

    public function store(Request $request)
    {
        Pool::create($request->all());
        return redirect()->route('pool.index')->with('message', 'El pool fue creado correctamente.');
    }

    public function create()
    {
        return view('administrador.pool.create');
    }

    public function edit($id)
    {
        $pool = Pool::find($id);
        return view('administrador.pool.edit', compact('pool'));
    }

    public function update(Request $request, $id)
    {
        $pool = Pool::find($id);
        $pool->update($request->all());

        return redirect()->route('pool.index')->with('message', 'El pool fue actualizado correctamente.');
    }

    public function destroy($id)
    {
        $category = Pool::find($id);
        $category->forceDelete();
        return redirect()->route('pool.index')->with('message', 'El pool fue eliminado correctamente.');
    }

    public function index()
    {
        $pools = Pool::latest()->paginate(5);
        return view('administrador.pool.index', compact('pools'));
    }
}
