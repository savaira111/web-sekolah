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
            
        return view('index', compact('articles', 'activeEskulCount'));
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

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        $articles = $query->latest('published_at')->paginate(6);
        
        $trendingArticles = \App\Models\Article::published()
            ->orderBy('views_count', 'desc')
            ->take(3)
            ->get();
            
        return view('news', compact('articles', 'trendingArticles'));
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
        return view('album');
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

        $relatedArticles = \App\Models\Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();
            
        return view('news_detail', compact('article', 'relatedArticles'));
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
        return view('extracurriculars.registration');
    }

    public function extracurricularRegistrationSuccess()
    {
        return view('extracurriculars.registration_success');
    }
}
