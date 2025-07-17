<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Mostrar listado de noticias
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    // Mostrar formulario para crear noticia
    public function create()
    {
        return view('news.create');
    }

    // Guardar noticia en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('uploads', 'public');
        }

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('news.index')->with('success', 'Noticia creada exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // Actualizar noticia
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $imageName = $request->file('image')->store('uploads', 'public');
            $news->image = $imageName;
        }

        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();

        return redirect()->route('news.index')->with('success', 'Noticia actualizada correctamente.');
    }

    // Eliminar noticia
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
