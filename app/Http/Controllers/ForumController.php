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
        if ($forum->user_id !== Auth::id()) {
            abort(403);
        }
        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Postingan berhasil dihapus.');
    }
}