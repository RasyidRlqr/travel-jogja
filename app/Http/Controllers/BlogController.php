<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $related_blogs = Blog::where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('blog.show', compact('blog', 'related_blogs'));
    }
}
