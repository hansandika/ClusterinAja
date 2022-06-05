<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $clusters = Cluster::get();
        return view('user.index', compact('user', 'clusters'));
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'dob' => ['required', 'before:today'],
            'password' => ['required', 'min:7', 'alpha_num'],
            'image' => ['mimes:jpeg,jpg,png,gif'],
            'biography' => ['nullable', 'min:7']
        ]);
        $user = Auth::user();
        if (!$user->cluster) {
            $request->validate([
                'cluster' => ['required']
            ]);
            $attr['cluster_id'] = $request->cluster;
        }

        $attr['password'] = bcrypt($attr['password']);
        $attr['dob'] = date('Y-m-d', strtotime($attr['dob']));

        if ($request->file('image')) {
            if (Auth::user()->profile_image) {
                Storage::disk('s3')->delete('profile-pictures/' . Auth::user()->profile_image);
            }

            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filePath = 'profile-pictures/' . $filename;
            $path = Storage::disk('s3')->put($filePath, file_get_contents($file));
            $attr['profile_image'] = $filename;
        }


        $user->update($attr);
        return redirect('/profile')->with('success-info', 'Update profile Successfully');
    }
}
