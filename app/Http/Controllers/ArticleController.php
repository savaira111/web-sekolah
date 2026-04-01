<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index(Request $request)
    {
        $total     = Article::count();
        $published = Article::where('is_published', true)->count();
        $drafts    = Article::where('is_published', false)->count();
        $views     = Article::sum('views_count');

        $query = Article::with('author');

        // Search filter
        $search = $request->get('search');
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Status filter
        $filter = $request->get('filter', 'all');
        if ($filter === 'published') {
            $query->where('is_published', true);
        } elseif ($filter === 'draft') {
            $query->where('is_published', false);
        }

        // Category filter
        $category = $request->get('category');
        if ($category) {
            $query->where('category', $category);
        }

        // Date sort
        $sort = $request->get('sort', 'newest');
        if ($sort === 'oldest') {
            $query->oldest('created_at');
        } else {
            $query->latest('created_at');
        }

        $articles = $query->paginate(10)->withQueryString();

        // Get all categories for the filter dropdown
        $categories = Article::distinct()->pluck('category')->sort()->values();

        return view('superadmin.articles.index', compact(
            'articles', 'total', 'published', 'drafts', 'views',
            'filter', 'category', 'sort', 'categories', 'search'
        ));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        $categories = [
            'Acara' => 'Acara',
            'Akademik' => 'Akademik',
            'Prestasi' => 'Prestasi',
            'Pengumuman' => 'Pengumuman',
            'Kegiatan' => 'Kegiatan',
            'Umum' => 'Umum',
        ];

        return view('superadmin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:50',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'nullable',
            'allow_comments' => 'nullable',
            'is_highlighted' => 'nullable',
        ]);

        $validated['is_published'] = $request->get('is_published') == '1';
        $validated['allow_comments'] = $request->has('allow_comments');
        $validated['is_highlighted'] = $request->has('is_highlighted');
        $validated['slug'] = Str::slug($request->title) . '-' . time();
        $validated['user_id'] = auth()->id();

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('articles', 'public');
            $validated['featured_image'] = $path;
        }

        if ($validated['is_published']) {
            $validated['published_at'] = now();
        }

        $article = Article::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil dibuat!',
                'redirect' => route('superadmin.articles.index')
            ]);
        }

        return redirect()->route('superadmin.articles.index')
            ->with('success', 'Artikel berhasil dibuat!');
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        return view('superadmin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article)
    {
        $categories = [
            'Berita Sekolah' => 'Berita Sekolah',
            'Pengumuman' => 'Pengumuman',
            'Prestasi' => 'Prestasi',
            'Artikel Guru' => 'Artikel Guru',
            'Kegiatan' => 'Kegiatan',
            'Umum' => 'Umum',
        ];

        return view('superadmin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:50',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'nullable',
            'allow_comments' => 'nullable',
            'is_highlighted' => 'nullable',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $article->id,
        ]);

        $validated['is_published'] = $request->has('is_published_toggle') ? ($request->get('is_published_toggle') == '1') : ($request->get('is_published') == '1');
        $validated['allow_comments'] = $request->has('allow_comments');
        $validated['is_highlighted'] = $request->has('is_highlighted');

        if ($request->hasFile('featured_image')) {
            if ($article->featured_image) {
                \Storage::disk('public')->delete($article->featured_image);
            }
            $path = $request->file('featured_image')->store('articles', 'public');
            $validated['featured_image'] = $path;
        }

        if ($validated['is_published'] && !$article->is_published) {
            $validated['published_at'] = now();
        } elseif (!$validated['is_published']) {
            $validated['published_at'] = null;
        }

        $article->update($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil diperbarui!',
                'redirect' => route('superadmin.articles.index')
            ]);
        }

        return redirect()->route('superadmin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article)
    {
        // Delete featured image if exists
        if ($article->featured_image) {
            \Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();

        return redirect()->route('superadmin.articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    /**
     * Toggle publish status of the specified article.
     */
    public function publish(Request $request, Article $article)
    {
        if ($article->is_published) {
            // Unpublish
            $article->update([
                'is_published' => false,
                'published_at' => null,
            ]);
            $message = 'Artikel berhasil diubah ke Draft.';
        } else {
            // Publish
            $article->update([
                'is_published' => true,
                'published_at' => now(),
            ]);
            $message = 'Artikel berhasil diterbitkan!';
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'is_published' => $article->is_published,
                'published_at' => $article->published_at ? $article->published_at->translatedFormat('d F Y H:i') : null,
            ]);
        }

        return redirect()->route('superadmin.articles.index')
            ->with('success', $message);
    }

    /**
     * Get article for public view with views incremented
     */
    public function publicShow($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $article->incrementViews();

        return view('articles.show', compact('article'));
    }
}
