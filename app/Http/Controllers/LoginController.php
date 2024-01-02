<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //logn
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $authenticate_credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        //logic auth
        if (Auth::attempt($authenticate_credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
            // echo 'success';
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
