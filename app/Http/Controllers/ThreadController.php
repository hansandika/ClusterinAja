<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use App\Models\ThreadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $threads = null;
        $user = Auth::user();

        if ($request->search) {
            if (Auth::user()->isAdmin()) {
                $threads = Thread::where('title', 'LIKE', '%' . $request->search . '%');
            } else {
                $threads = Thread::where('title', 'LIKE', '%' . $request->search . '%')->where('cluster_id', $user->cluster_id);
            }
        } else {
            if (Auth::user()->isAdmin()) {
                $threads = Thread::where('title', 'LIKE', '%' . '%');
            } else {
                $threads = Thread::where('title', 'LIKE', '%' . '%')->where('cluster_id', $user->cluster_id);
            }
        }


        if ($request->category == 'Watery') {
            $threads = $threads->where('thread_category_id', 1)->orderBy('updated_at', 'DESC')->paginate(4);
        } else if ($request->category == 'Financial') {
            $threads = $threads->where('thread_category_id', 2)->orderBy('updated_at', 'DESC')->paginate(4);
        } else if ($request->category == 'Electricity') {
            $threads = $threads->where('thread_category_id', 3)->orderBy('updated_at', 'DESC')->paginate(4);
        } else if ($request->category == 'Other') {
            $threads = $threads->where('thread_category_id', 4)->orderBy('updated_at', 'DESC')->paginate(4);
        } else {
            $threads = $threads->orderBy('updated_at', 'DESC')->paginate(4);
        }

        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        $types = ThreadCategory::get();
        return view('threads.create', compact('types'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'title' => ['required', 'min:3'],
            'type' => ['required'],
            'description' => ['required', 'min:7'],
            'image' => ['mimes:jpeg,jpg,png,gif']
        ]);

        $user = Auth::user();
        $attr['cluster_id'] = $user->cluster_id;
        $attr['user_id'] = Auth::id();
        $attr['slug'] = \Str::slug($attr['title']);
        $attr['thread_category_id'] = $attr['type'];

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/threads'), $filename);
            $attr['thread_image'] = $filename;
        }
        Thread::create($attr);

        return redirect('/discussion')->with('success-info', 'Add discussion Successfully');
    }

    public function show(Thread $thread)
    {
        $threads = Thread::where('thread_category_id', $thread->thread_category_id)->where('id', '!=', $thread->id)->latest()->limit(3)->get();
        return view('threads.show', compact('thread', 'threads'));
    }

    public function edit(Thread $thread)
    {
        $types = ThreadCategory::get();
        return view('threads.edit', compact('thread', 'types'));
    }

    public function update(Request $request, Thread $thread)
    {
        $this->authorize('update', $thread);

        $attr = $request->validate([
            'title' => ['required', 'min:3'],
            'type' => ['required'],
            'description' => ['required', 'min:7'],
            'image' => ['mimes:jpeg,jpg,png,gif']
        ]);

        $attr['user_id'] = Auth::id();
        $attr['slug'] = \Str::slug($attr['title']);
        $attr['thread_category_id'] = $attr['type'];

        if ($request->file('image')) {
            if ($thread->thread_image) {
                Storage::delete('public/threads/' . $thread->thread_image);
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/threads'), $filename);
            $attr['thread_image'] = $filename;
        }

        $thread->update($attr);
        return redirect('/discussion')->with('success-info', 'Update discussion Successfully');
    }

    public function destroy(Thread $thread)
    {
        $this->authorize('delete', $thread);

        Comment::where('thread_id', $thread->id)->delete();
        if ($thread->thread_image) {
            Storage::delete('public/threads/' . $thread->thread_image);
        }
        $thread->delete();
        return redirect('/discussion')->with('success-info', 'Delete discussion Successfully');
    }
}
