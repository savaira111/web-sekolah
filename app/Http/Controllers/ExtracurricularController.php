<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = Extracurricular::latest()->get();
        $activeCount = Extracurricular::where('is_active', true)->count();
        $inactiveCount = Extracurricular::where('is_active', false)->count();

        return view('superadmin.eskul.index', compact('extracurriculars', 'activeCount', 'inactiveCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'Olahraga' => 'Olahraga',
            'Umum' => 'Umum',
        ];

        return view('superadmin.eskul.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'schedule_info' => 'nullable|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('eskul', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = true;
        Extracurricular::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Eskul berhasil dibuat!',
                'redirect' => route('superadmin.eskul.index')
            ]);
        }

        return redirect()->route('superadmin.eskul.index')->with('success', 'Eskul berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extracurricular $eskul)
    {
        return redirect()->route('superadmin.eskul.edit', $eskul);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $eskul)
    {
        $categories = [
            'Olahraga' => 'Olahraga',
            'Umum' => 'Umum',
        ];

        return view('superadmin.eskul.edit', compact('eskul', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extracurricular $eskul)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_active' => 'nullable',
            'weekly_schedule' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            if ($eskul->image) {
                Storage::disk('public')->delete($eskul->image);
            }
            $path = $request->file('image')->store('eskul', 'public');
            $validated['image'] = $path;
        }

        if ($request->has('is_active')) {
            $validated['is_active'] = $request->is_active == '1';
        }

        if ($request->has('weekly_schedule_json')) {
            $validated['weekly_schedule'] = json_decode($request->weekly_schedule_json, true);
        }

        $eskul->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Eskul berhasil diperbarui!',
                'redirect' => route('superadmin.eskul.index')
            ]);
        }

        return redirect()->route('superadmin.eskul.index')->with('success', 'Eskul berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $eskul)
    {
        if ($eskul->image) {
            Storage::disk('public')->delete($eskul->image);
        }
        $eskul->delete();

        return redirect()->route('superadmin.eskul.index')->with('success', 'Eskul berhasil dihapus!');
    }

    /**
     * Toggle the active status.
     */
    public function toggleStatus(Extracurricular $eskul)
    {
        $eskul->update(['is_active' => !$eskul->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $eskul->is_active,
            'message' => 'Status berhasil diubah!'
        ]);
    }

    /**
     * Display a listing of extracurricular registrations.
     */
    public function registrations()
    {
        return view('superadmin.eskul.registrations');
    }
}
