<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Thread $thread)
    {
        $attr = $request->validate([
            'comment' => ['required'],
        ]);
        $attr['description'] = $attr['comment'];
        $attr['user_id'] = Auth::id();
        $attr['thread_id'] = $thread->id;
        Comment::create($attr);
        return redirect('/discussion/' . $thread->slug);
    }
}
