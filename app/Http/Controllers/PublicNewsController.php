<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PublicNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(100);
        return view('public.news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('public.news.show', compact('news'));
    }
} 