<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'dob' => ['required', 'before:today'],
            'password' => ['required', 'min:7', 'alpha_num'],
            'image' => ['mimes:jpeg,jpg,png,gif'],
            'biography' => ['min:7']
        ]);
        $attr['password'] = bcrypt($attr['password']);
        $attr['dob'] = date('Y-m-d', strtotime($attr['dob']));

        if ($request->file('image')) {
            if (Auth::user()->profile_image) {
                Storage::delete('public/profile-pictures/' . Auth::user()->profile_image);
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/profile-pictures'), $filename);
            $attr['profile_image'] = $filename;
        }

        $user = Auth::user();
        $user->update($attr);
    }
}
