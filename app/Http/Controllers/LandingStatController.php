<?php

namespace App\Http\Controllers;

use App\Models\LandingStat;
use Illuminate\Http\Request;

class LandingStatController extends Controller
{
    public function index()
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('landing_stats')) {
            return view('superadmin.landing-stats.index', ['stats' => []])
                ->with('error', 'Tabel landing_stats tidak ditemukan. Silakan jalankan migrasi.');
        }
        $stats = LandingStat::orderBy('order')->get();
        return view('superadmin.landing-stats.index', compact('stats'));
    }

    public function create()
    {
        return view('superadmin.landing-stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'color' => 'required|string|max:50',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');
        
        LandingStat::create($validated);

        return redirect()->route('superadmin.landing-stats.index')
            ->with('success', 'Statistik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $landing_stat = LandingStat::findOrFail($id);
        return view('superadmin.landing-stats.edit', compact('landing_stat'));
    }

    public function update(Request $request, $id)
    {
        $landing_stat = LandingStat::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'color' => 'required|string|max:50',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $landing_stat->update($validated);

        return redirect()->route('superadmin.landing-stats.index')
            ->with('success', 'Statistik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $landing_stat = LandingStat::findOrFail($id);
        $landing_stat->delete();

        return redirect()->route('superadmin.landing-stats.index')
            ->with('success', 'Statistik berhasil dihapus!');
    }
}
