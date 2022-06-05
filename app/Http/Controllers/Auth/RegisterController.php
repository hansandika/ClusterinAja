<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cluster;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $clusters = Cluster::get();
        return view('auth.register', compact('clusters'));
    }

    public function register(Request $request)
    {
        $attr = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'dob' => ['required', 'before:today'],
            'password' => ['required', 'min:7', 'alpha_num'],
            'confirm-password' => ['required', 'same:password'],
            'cluster' => ['required'],
            'agreement' => ['required']
        ]);

        $attr['dob'] = date('Y-m-d', strtotime($attr['dob']));
        $attr['name'] = substr($request->email, 0, strpos($request->email, '@'));
        $attr['cluster_id'] = $attr['cluster'];
        $attr['password'] = bcrypt($attr['password']);
        User::create($attr);

        return redirect('/login');
    }
}
