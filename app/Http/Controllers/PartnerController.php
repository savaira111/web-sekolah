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
            // New Detail Fields
            'location' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'student_testimonials_data' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $validated['is_active'] = $request->has('is_active') ? $request->is_active : true;

        // Handle Logo
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('partners/logos', 'public');
        }

        // Handle Featured Image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('partners/featured', 'public');
        }

        // Handle Dynamic Testimonials Array
        $testimonialsInput = $request->input('student_testimonials_data', []);
        $savedTestimonials = [];
        
        if (is_array($testimonialsInput)) {
            foreach ($testimonialsInput as $index => $t) {
                // If the entire row is empty (just clicked add, but didn't fill anything), skip it
                if (empty($t['text']) && empty($t['author'])) {
                    continue;
                }

                $photoPath = $t['existing_photo'] ?? null;
                
                if ($request->hasFile("student_testimonials_data.{$index}.photo")) {
                    $photoPath = $request->file("student_testimonials_data.{$index}.photo")->store('partners/testimonials', 'public');
                }
                
                $savedTestimonials[] = [
                    'text' => $t['text'] ?? '',
                    'author' => $t['author'] ?? '',
                    'role' => $t['role'] ?? '',
                    'rating' => $t['rating'] ?? 5,
                    'photo_url' => $photoPath,
                ];
            }
        }
        $validated['student_testimonials_data'] = $savedTestimonials;

        // Handle Gallery Images
        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryPaths[] = $image->store('partners/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryPaths;
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
            // New Detail Fields
            'location' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'student_testimonials_data' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Handle Logo
        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $validated['logo'] = $request->file('logo')->store('partners/logos', 'public');
        }

        // Handle Featured Image
        if ($request->hasFile('featured_image')) {
            if ($partner->featured_image) {
                Storage::disk('public')->delete($partner->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('partners/featured', 'public');
        }

        // Handle Dynamic Testimonials Array
        $testimonialsInput = $request->input('student_testimonials_data', []);
        $savedTestimonials = [];
        
        if (is_array($testimonialsInput)) {
            foreach ($testimonialsInput as $index => $t) {
                // If they check a "_delete" flag, we delete the photo and don't add it
                if (!empty($t['_delete'])) {
                    if (!empty($t['existing_photo'])) {
                        Storage::disk('public')->delete($t['existing_photo']);
                    }
                    continue;
                }

                if (empty($t['text']) && empty($t['author'])) {
                    continue; // Skip silently if empty
                }

                $photoPath = $t['existing_photo'] ?? null;
                
                if ($request->hasFile("student_testimonials_data.{$index}.photo")) {
                    // delete old if replacing
                    if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                        Storage::disk('public')->delete($photoPath);
                    }
                    $photoPath = $request->file("student_testimonials_data.{$index}.photo")->store('partners/testimonials', 'public');
                }
                
                $savedTestimonials[] = [
                    'text' => $t['text'] ?? '',
                    'author' => $t['author'] ?? '',
                    'role' => $t['role'] ?? '',
                    'rating' => $t['rating'] ?? 5,
                    'photo_url' => $photoPath,
                ];
            }
        }
        $validated['student_testimonials_data'] = $savedTestimonials;

        // Handle Gallery Images (Append or Replace logic, here we replace if new images provided)
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images if needed
            if ($partner->gallery_images) {
                foreach ($partner->gallery_images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryPaths[] = $image->store('partners/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryPaths;
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
