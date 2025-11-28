<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->paginate(10);
        return view('admin.tour.index', compact('tours'));
    }

    public function create()
    {
        return view('admin.tour.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:tours,slug',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'itinerary' => 'nullable|string',
            'includes' => 'nullable|string',
            'excludes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tours', 'public');
        }

        Tour::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'duration_days' => $validated['duration_days'],
            'itinerary' => $validated['itinerary'] ?? '',
            'includes' => $validated['includes'] ?? '',
            'excludes' => $validated['excludes'] ?? '',
            'image' => $imagePath,
            'image_url' => $validated['image_url'] ?? null,
        ]);

        return redirect()->route('admin.tour.index')->with('success', 'Paket wisata berhasil ditambahkan!');
    }

    public function edit(Tour $tour)
    {
        return view('admin.tour.edit', compact('tour'));
    }

    public function update(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:tours,slug,' . $tour->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'itinerary' => 'nullable|string',
            'includes' => 'nullable|string',
            'excludes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $imagePath = $tour->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tours', 'public');
        }

        $tour->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'duration_days' => $validated['duration_days'],
            'itinerary' => $validated['itinerary'] ?? '',
            'includes' => $validated['includes'] ?? '',
            'excludes' => $validated['excludes'] ?? '',
            'image' => $imagePath,
            'image_url' => $validated['image_url'] ?? null,
        ]);

        return redirect()->route('admin.tour.index')->with('success', 'Paket wisata berhasil diperbarui!');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('admin.tour.index')->with('success', 'Paket tour berhasil dihapus!');
    }
}
