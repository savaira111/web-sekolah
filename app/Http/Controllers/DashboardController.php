<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_students' => Applicant::where('status', 'Diterima')->count(),
            'total_editors' => User::where('role', '!=', 'Superadmin')->count(),
            'total_ppdb' => Applicant::count(),
            'total_articles' => Article::where('is_published', true)->count(),
        ];

        // Major Distribution for Donut Chart
        $major_distribution = Applicant::select('major', DB::raw('count(*) as count'))
            ->groupBy('major')
            ->get();

        // Recent Activity (Mixed)
        $recent_applicants = Applicant::latest()->take(3)->get()->map(function($applicant) {
            return [
                'user' => $applicant->full_name,
                'action' => 'Melakukan pendaftaran PPDB #' . $applicant->registration_number,
                'module' => 'PPDB',
                'status' => 'Success',
                'time' => $applicant->created_at->diffForHumans(),
                'type' => 'ppdb'
            ];
        });

        $recent_articles = Article::latest()->take(2)->get()->map(function($article) {
            return [
                'user' => $article->author->name ?? 'Admin',
                'action' => 'Menerbitkan artikel: "' . $article->title . '"',
                'module' => 'Artikel',
                'status' => $article->is_published ? 'Success' : 'Draft',
                'time' => $article->updated_at->diffForHumans(),
                'type' => 'article'
            ];
        });

        $activities = $recent_applicants->concat($recent_articles)->sortByDesc('time')->take(5);

        // PPDB Trend (Last 7 Days)
        $ppdb_trend = Applicant::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        return view('superadmin.dashboard', compact('stats', 'major_distribution', 'activities', 'ppdb_trend'));
    }
}
