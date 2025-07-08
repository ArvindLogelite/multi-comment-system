<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function store(Request $request)
{
    $validated = $request->validate([
        'content' => 'nullable|string',
        'post_id' => 'required|exists:posts,id',
        'parent_comment_id' => 'nullable|exists:comments,id',
    ]);

    try {
        Comment::create([
            'content' => $validated['content'],
            'post_id' => $validated['post_id'],
            'parent_comment_id' => $validated['parent_comment_id'] ?? null,
        ]);
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()]);
    }

    return back();
}
}
