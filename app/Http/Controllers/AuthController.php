<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // menampilkan halaman login
    public function showLogin()
    {
        if (session()->has('user')) {
            return redirect()->route('home');
        }

        return view('login');
    }

    // proses login
    public function login(Request $request)
    {
        $valid_user = "admin";
        $valid_pass = "12345";

        if (
            $request->username == $valid_user &&
            $request->password == $valid_pass
        ) {
            // simpan session
            session()->put('user', $request->username);

            return redirect()->route('home');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    // logout
    public function logout()
    {
        session()->forget('user');

        return redirect()->route('login');
    }
}