<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = Post::published()
            ->where('is_headline', false)
            ->latest()
            ->paginate(8);

        $popularNews = Post::published()
            ->popular()
            ->limit(5)
            ->get();

        return view('index', compact('latestNews', 'popularNews'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::published()
            ->where('title', 'LIKE', "%{$query}%")
            ->latest()
            ->paginate(12);

        return view('search', compact('posts', 'query'));
    }
}
