<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::with('user')->latest()->get();
        return view('forum.index', compact('forums'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        Forum::create($validated);

        return redirect()->route('forum.index');
    }

    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);

        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Postingan berhasil dihapus.');
    }

    public function getLatestForums()
    {
        $forums = Forum::with('user')->latest()->take(5)->get(); // ambil 5 forum terbaru
        return $forums;
    }

    public function like($id)
    {
        $forum = Forum::findOrFail($id);
        $user = auth()->user();

        // Cegah like dobel
        if (!$forum->isLikedBy($user)) {
            $forum->likedByUsers()->attach($user->id);
        }

        return redirect()->back();
    }

}