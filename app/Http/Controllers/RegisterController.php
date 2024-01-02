<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //register
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:4',
            'email' => 'required|unique:users|email:rfc,dns',
            'password'   => 'required|min:4',
        ]);

        //simpan ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}
