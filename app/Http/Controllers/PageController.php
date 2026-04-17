<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::published()
            ->latest('published_at')
            ->take(3)
            ->get();
            
        $activeEskulCount = \App\Models\Extracurricular::where('is_active', true)->count();
            
        $albums = \App\Models\Album::with('photos')
            ->where('is_visible', true)
            ->latest()
            ->take(3)
            ->get();
            
        $landingStats = \App\Models\LandingStat::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        return view('index', compact('articles', 'activeEskulCount', 'albums', 'landingStats'));
    }

    public function jurusan()
    {
        return view('programs');
    }

    public function dkv()
    {
        return view('programs.dkv');
    }

    public function pplg()
    {
        return view('programs.pplg');
    }

    public function news(Request $request)
    {
        $query = \App\Models\Article::published();

        // Search by Title/Content
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('content', 'like', $searchTerm);
            });
        }

        // Filter by Month
        if ($request->filled('month')) {
            $query->whereMonth('published_at', $request->month);
        }

        // Filter by Year
        if ($request->filled('year')) {
            $query->whereYear('published_at', $request->year);
        }

        $articles = $query->latest('published_at')->paginate(6)->withQueryString();
        
        $trendingArticles = \App\Models\Article::published()
            ->orderBy('views_count', 'desc')
            ->take(3)
            ->get();

        // Dynamic Archive Data
        $archiveData = \App\Models\Article::published()
            ->selectRaw('year(published_at) year, month(published_at) month, count(*) data')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
            
        return view('news', compact('articles', 'trendingArticles', 'archiveData'));
    }

    public function facilities()
    {
        return view('facilities');
    }

    public function staff()
    {
        return view('staff');
    }

    public function profile()
    {
        return view('profile');
    }

    public function seragam()
    {
        return view('seragam');
    }

    public function album()
    {
        $albums = \App\Models\Album::with('photos')->where('is_visible', true)->latest()->get();
        return view('album', compact('albums'));
    }

    public function albumDetail($id)
    {
        $album = \App\Models\Album::with('photos')->where('is_visible', true)->findOrFail($id);
        return view('album_detail', compact('album'));
    }

    public function enrollmentGuide()
    {
        return view('enrollment_guide');
    }

    public function registration()
    {
        return view('registration');
    }

    public function newsDetail($slug)
    {
        $article = \App\Models\Article::published()
            ->where('slug', $slug)
            ->firstOrFail();
            
        // Perbarui jumlah tayangan
        $article->incrementViews();

        $relatedArticles = \App\Models\Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();
            
        $comments = \App\Models\Comment::where('article_id', $article->id)
            ->approved()
            ->latest()
            ->get();
            
        return view('news_detail', compact('article', 'relatedArticles', 'comments'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function extracurriculars()
    {
        $extracurriculars = \App\Models\Extracurricular::where('is_active', true)->get();
        return view('extracurriculars.index', compact('extracurriculars'));
    }

    public function extracurricularDetail($id)
    {
        $eskul = \App\Models\Extracurricular::findOrFail($id);
        return view('extracurriculars.show', compact('eskul'));
    }

    public function panahan()
    {
        return view('extracurriculars.panahan');
    }

    public function rohis()
    {
        return view('extracurriculars.rohis');
    }

    public function silat()
    {
        return view('extracurriculars.silat');
    }

    public function futsal()
    {
        return view('extracurriculars.futsal');
    }

    public function paskibra()
    {
        return view('extracurriculars.paskibra');
    }

    public function pramuka()
    {
        return view('extracurriculars.pramuka');
    }

    public function registrationSuccess()
    {
        return view('registration_success');
    }

    public function extracurricularRegistration()
    {
        $legacyEskuls = [
            ['name' => 'Pramuka (Wajib)', 'category' => 'Wajib', 'schedule_info' => 'Lapangan Utama', 'weekly_schedule' => ['Jumat' => '13.00 - 15.00'], 'is_active' => true],
            ['name' => 'Futsal Putra', 'category' => 'Olahraga', 'schedule_info' => 'Gor Olahraga', 'weekly_schedule' => ['Selasa' => '15.30 - 17.00'], 'is_active' => true],
            ['name' => 'Paskibra', 'category' => 'Kepemimpinan', 'schedule_info' => 'Lapangan Utama', 'weekly_schedule' => ['Sabtu' => '08.00 - 10.00'], 'is_active' => true],
            ['name' => 'Panahan', 'category' => 'Olahraga', 'schedule_info' => 'Lapangan Panahan', 'weekly_schedule' => ['Rabu' => '15.00 - 17.00'], 'is_active' => true],
            ['name' => 'Rohis', 'category' => 'Keagamaan', 'schedule_info' => 'Mesjid Sekolah', 'weekly_schedule' => ['Kamis' => '15.30 - 17.00'], 'is_active' => true],
            ['name' => 'Pencak Silat', 'category' => 'Seni Beladiri', 'schedule_info' => 'Aula Sekolah', 'weekly_schedule' => ['Senin' => '15.30 - 17.00'], 'is_active' => true],
        ];

        foreach ($legacyEskuls as $eskul) {
            \App\Models\Extracurricular::firstOrCreate(['name' => $eskul['name']], $eskul);
        }

        $extracurriculars = \App\Models\Extracurricular::where('is_active', true)->get();
        return view('extracurriculars.registration', compact('extracurriculars'));
    }

    public function extracurricularRegistrationSuccess()
    {
        return view('extracurriculars.registration_success');
    }

    public function mitra(Request $request)
    {
        $query = \App\Models\Partner::where('is_active', true);
        
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        
        $partners = $query->latest()->get();
        $categories = ['Mitra Industri', 'Sponsor', 'Universitas', 'Lembaga', 'Umum'];
        
        return view('mitra', compact('partners', 'categories', 'request'));
    }

    public function mitraDetail($id)
    {
        $partner = \App\Models\Partner::where('is_active', true)->findOrFail($id);
        return view('mitra_detail', compact('partner'));
    }
}
