<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured_tours = Tour::latest()->take(3)->get();
        $services = Service::all();
        $latest_blogs = Blog::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(6)->get();

        return view('welcome', compact('featured_tours', 'services', 'latest_blogs', 'galleries'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $related_blogs = Blog::where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('blog.detail', compact('blog', 'related_blogs'));
    }

    public function services()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function tours()
    {
        $tours = Tour::latest()->paginate(9);
        return view('tours.index', compact('tours'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('gallery.index', compact('galleries'));
    }
}
