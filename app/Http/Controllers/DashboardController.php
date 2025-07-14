<?php

namespace App\Http\Controllers;

use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $latestNews = News::latest()->take(5)->get();
        $newsCount = News::count();
        return view('dashboard', compact('latestNews', 'newsCount'));
    }
} 