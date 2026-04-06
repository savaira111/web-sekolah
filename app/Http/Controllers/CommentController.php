<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of comments for superadmin.
     */
    public function index()
    {
        $totalComments = Comment::count();
        $pendingComments = Comment::where('status', 'pending')->count();
        $comments = Comment::with('article')->latest()->paginate(10);

        return view('superadmin.comments.index', compact('comments', 'totalComments', 'pendingComments'));
    }

    /**
     * Store a newly created comment in storage (Public Access).
     */
    public function store(Request $request, $articleId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'body' => 'required|string|max:1000',
        ]);

        Comment::create([
            'article_id' => $articleId,
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
            'status' => 'pending', // Default to pending
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Komentar Anda sedang menunggu persetujuan admin.',
        ]);
    }

    /**
     * Approve the specified comment.
     */
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['status' => 'approved']);

        return redirect()->route('superadmin.comments.index')
            ->with('success', 'Komentar berhasil disetujui!');
    }

    /**
     * Reject the specified comment.
     */
    public function reject($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['status' => 'rejected']);

        return redirect()->route('superadmin.comments.index')
            ->with('success', 'Komentar berhasil ditolak!');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('superadmin.comments.index')
            ->with('success', 'Komentar berhasil dihapus!');
    }
}
