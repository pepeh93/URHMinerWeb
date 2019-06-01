<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyAdmin', ['except' => ['indexForApi', 'show']]);
    }

    public function store(Request $request)
    {
        try {
            $path = $request->imageFile->store('public/uploads');
            $request->request->add(['image' => basename($path)]); //add request
            Content::create($request->all());

            return redirect()->route('content.index')->with('message', 'El contenido fue creado correctamente.');

        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function create()
    {
        $categories = Category::all();
        return view('administrador.content.create', compact('categories'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $content = Content::find($id);
        return view('administrador.content.edit', compact('content', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::find($id);
        $content->update($request->all());

        if ($request->has('image')) {
            $image = basename($request->imageFile->store('public/uploads'));
            $content->image = $image;
            $content->save();
        }

        return redirect()->route('content.index')->with('message', 'El contenido fue actualizado correctamente.');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        Storage::delete('uploads/' . $content->image);
        Favorite::where('content_id', $content->id)->delete();
        $content->delete();

        return redirect()->route('content.index')->with('message', 'El contenido fue eliminado correctamente.');
    }

    public function indexForApi()
    {
        $categories = Category::with('content')->whereHas('content')->get();
        return \App\Http\Resources\Category::collection($categories);
    }

    public function index()
    {
        $contents = Content::latest()->paginate(5);
        return view('administrador.content.index', compact('contents'));
    }


    public function show($id)
    {
        $content = Content::findOrFail($id);
        return $content;
    }
}
