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
    public function index()
    {
        $total = Article::count();
        $published = Article::where('is_published', true)->count();
        $drafts = Article::where('is_published', false)->count();
        $views = Article::sum('views_count');

        $articles = Article::with('author')
            ->latest('created_at')
            ->paginate(10);

        return view('superadmin.articles.index', compact(
            'articles',
            'total',
            'published',
            'drafts',
            'views'
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
            'is_published' => 'boolean',
        ]);

        // Generate slug from title
        $validated['slug'] = Str::slug($request->title) . '-' . time();
        $validated['user_id'] = auth()->id();

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('articles', 'public');
            $validated['featured_image'] = $path;
        }

        // Set published_at if is_published is true
        if ($request->boolean('is_published')) {
            $validated['published_at'] = now();
        }

        $article = Article::create($validated);

        return redirect()->route('superadmin.articles.show', $article->id)
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
            'Acara' => 'Acara',
            'Akademik' => 'Akademik',
            'Prestasi' => 'Prestasi',
            'Pengumuman' => 'Pengumuman',
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
            'is_published' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($article->featured_image) {
                \Storage::disk('public')->delete($article->featured_image);
            }
            $path = $request->file('featured_image')->store('articles', 'public');
            $validated['featured_image'] = $path;
        }

        // Set published_at if is_published is true and wasn't published before
        if ($request->boolean('is_published') && !$article->is_published) {
            $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()->route('superadmin.articles.show', $article->id)
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
