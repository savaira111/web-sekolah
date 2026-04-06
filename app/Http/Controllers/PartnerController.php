<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of partners.
     */
    public function index(Request $request)
    {
        $total = Partner::count();
        $active = Partner::where('is_active', true)->count();
        $inactive = Partner::where('is_active', false)->count();

        $query = Partner::query();

        // Search filter
        $search = $request->get('search');
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Status filter
        $filter = $request->get('filter', 'all');
        if ($filter === 'active') {
            $query->where('is_active', true);
        } elseif ($filter === 'inactive') {
            $query->where('is_active', false);
        }

        // Category filter
        $category = $request->get('category');
        if ($category) {
            $query->where('category', $category);
        }

        // Sort
        $sort = $request->get('sort', 'newest');
        if ($sort === 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }

        $partners = $query->paginate(10)->withQueryString();

        // Get all categories
        $categories = Partner::distinct()->pluck('category')->sort()->values();

        return view('superadmin.partners.index', compact(
            'partners', 'total', 'active', 'inactive',
            'filter', 'category', 'sort', 'categories', 'search'
        ));
    }

    /**
     * Show the form for creating a new partner.
     */
    public function create()
    {
        $categories = [
            'Mitra Industri' => 'Mitra Industri',
            'Sponsor' => 'Sponsor',
            'Universitas' => 'Universitas',
            'Lembaga' => 'Lembaga',
            'Umum' => 'Umum',
        ];

        return view('superadmin.partners.create', compact('categories'));
    }

    /**
     * Store a newly created partner in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'website_url' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:50',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active') ? $request->is_active : true;

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('partners', 'public');
            $validated['logo'] = $path;
        }

        $partner = Partner::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Mitra Industri berhasil ditambahkan!',
                'redirect' => route('superadmin.partners.index')
            ]);
        }

        return redirect()->route('superadmin.partners.index')
            ->with('success', 'Mitra Industri berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified partner.
     */
    public function edit(Partner $partner)
    {
        $categories = [
            'Mitra Industri' => 'Mitra Industri',
            'Sponsor' => 'Sponsor',
            'Universitas' => 'Universitas',
            'Lembaga' => 'Lembaga',
            'Umum' => 'Umum',
        ];

        return view('superadmin.partners.edit', compact('partner', 'categories'));
    }

    /**
     * Update the specified partner in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'website_url' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:50',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active_toggle') ? ($request->get('is_published_toggle') == '1') : ($request->get('is_active') == '1');
        // Let's make it simpler for checkbox/toggle
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $path = $request->file('logo')->store('partners', 'public');
            $validated['logo'] = $path;
        }

        $partner->update($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Mitra Industri berhasil diperbarui!',
                'redirect' => route('superadmin.partners.index')
            ]);
        }

        return redirect()->route('superadmin.partners.index')
            ->with('success', 'Mitra Industri berhasil diperbarui!');
    }

    /**
     * Remove the specified partner from storage.
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('superadmin.partners.index')
            ->with('success', 'Mitra Industri berhasil dihapus!');
    }

    /**
     * Toggle status of the partner.
     */
    public function toggleStatus(Request $request, Partner $partner)
    {
        $partner->update([
            'is_active' => !$partner->is_active
        ]);

        $message = $partner->is_active ? 'Mitra berhasil diaktifkan!' : 'Mitra berhasil dinonaktifkan.';

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'is_active' => $partner->is_active,
            ]);
        }

        return redirect()->route('superadmin.partners.index')
            ->with('success', $message);
    }
}
