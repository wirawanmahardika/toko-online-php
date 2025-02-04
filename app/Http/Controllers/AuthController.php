<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            "email" => ["required", "email", "min:5"],
            "password" => ['required', 'min:6']
        ]);

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::select("role")->where("email", $request->email)->first();
            if ($user->role === 'admin') return redirect('/admin');
            else return redirect('/');
        }


        return redirect("/login");
    }

    public function signupPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100', 'min:2'],
            'email' => ['required', 'max:50', 'email'],
            'alamat' => ['required', 'max:100', 'min:2'],
            'koordinat' => ['required', 'max:100', 'min:2'],
            'password' => ['required', 'max:20', 'min:6'],
        ]);

        User::create($request->all());
        return redirect()->back()->with("message", "Berhasil signup");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
