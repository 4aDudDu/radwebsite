<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::published()
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(12);

        return view('categories.show', compact('category', 'posts'));
    }
}
