<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\RequestCategory;
use Illuminate\Http\Request as BrowserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(BrowserRequest $browserRequest)
    {
        $requests = null;

        if (Auth::user()->isAdmin()) {
            $requests = Request::where('title', 'LIKE', '%' . '%');
        } else {
            $requests = Request::where('user_id', Auth::id());
        }

        if ($browserRequest->category == 'Help') {
            $requests = $requests->where('request_category_id', 1)->orderBy('updated_at', 'DESC')->paginate(4);
        } else if ($browserRequest->category == 'Maintanance') {
            $requests = $requests->where('request_category_id', 2)->orderBy('updated_at', 'DESC')->paginate(4);
        } else if ($browserRequest->category == 'Repair') {
            $requests = $requests->where('request_category_id', 3)->orderBy('updated_at', 'DESC')->paginate(4);
        } else {
            $requests = $requests->orderBy('updated_at', 'DESC')->paginate(4);
        }
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        $types = RequestCategory::get();
        return view('requests.create', compact('types'));
    }

    public function store(BrowserRequest $browserRequest)
    {
        $attr = $browserRequest->validate([
            'title' => ['required', 'min:3'],
            'type' => ['required'],
            'description' => ['required', 'min:7'],
            'image' => ['mimes:jpeg,jpg,png,gif'],
        ]);

        $attr['user_id'] = Auth::id();
        $attr['request_category_id'] = $attr['type'];
        $attr['status'] = 1;
        if ($browserRequest->file('image')) {
            $file = $browserRequest->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filePath = 'public/requests/' . $filename;
            Storage::put($filePath, file_get_contents($file));
            $attr['request_image'] = $filename;
        }
        Request::create($attr);

        return redirect('/request')->with('success-info', 'Add request Successfully');
    }

    public function edit(Request $request)
    {
        $types = RequestCategory::get();
        return view('requests.edit', compact('request', 'types'));
    }

    public function update(BrowserRequest $browserRequest, Request $request)
    {
        $this->authorize('update', $request);

        $attr = $browserRequest->validate([
            'title' => ['required', 'min:3'],
            'type' => ['required'],
            'description' => ['required', 'min:7'],
            'image' => ['mimes:jpeg,jpg,png,gif'],
            'status' => ['required']
        ]);

        $attr['user_id'] = Auth::id();
        $attr['request_category_id'] = $attr['type'];

        if ($browserRequest->file('image')) {
            if ($request->request_image) {
                Storage::delete('public/requests/' . $request->request_image);
            }
            $file = $browserRequest->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filePath = 'public/requests/' . $filename;
            Storage::put($filePath, file_get_contents($file));
            $attr['request_image'] = $filename;
        }

        $request->update($attr);
        return redirect('/request')->with('success-info', 'Update request Successfully');
    }

    public function destroy(Request $request)
    {
        $this->authorize('delete', $request);

        if ($request->request_image) {
            Storage::delete('public/requests/' . $request->request_image);
        }
        $request->delete();
        return redirect('/request')->with('success-info', 'Delete discussion Successfully');
    }
}
