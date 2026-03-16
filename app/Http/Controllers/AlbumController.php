<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('photos')->latest()->get();
        return view('superadmin.albums.index', compact('albums'));
    }

    public function create()
    {
        return view('superadmin.albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'event_date' => 'required|date',
            'description' => 'required|string',
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $album = Album::create([
            'title' => $request->title,
            'category' => $request->category,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'is_visible' => $request->has('is_visible') ? $request->is_visible : true,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photoFile) {
                $path = $photoFile->store('albums', 'public');
                $album->photos()->create(['path' => $path]);
            }
        }

        return response()->json([
            'message' => 'Album berhasil disimpan!',
            'redirect' => route('superadmin.albums.index')
        ]);
    }

    public function show(Album $album)
    {
        return view('superadmin.albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        return view('superadmin.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'event_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $album->update([
            'title' => $request->title,
            'category' => $request->category,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'is_visible' => $request->has('is_visible') ? $request->is_visible : true,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photoFile) {
                $path = $photoFile->store('albums', 'public');
                $album->photos()->create(['path' => $path]);
            }
        }

        return response()->json([
            'message' => 'Album berhasil diperbarui!',
            'redirect' => route('superadmin.albums.index')
        ]);
    }

    public function destroy(Album $album)
    {
        // Delete photos from storage
        foreach ($album->photos as $photo) {
            Storage::disk('public')->delete($photo->path);
        }
        
        $album->delete();
        return redirect()->route('superadmin.albums.index')->with('success', 'Album berhasil dihapus');
    }

    public function toggleVisibility(Album $album)
    {
        $album->is_visible = !$album->is_visible;
        $album->save();

        return response()->json(['success' => true]);
    }
}
