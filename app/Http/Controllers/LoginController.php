<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Input;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }
    public function postlogin(Request $request) 
    {
        $request->validate([
            'email' => ['required','max:255','exists:users,email'],
            'password' => ['required','min:8'],
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->put('user', [
                'email' => $request->email,
            ]);

            return redirect('/');
        }
    }

    public function logout(Request $request) 
    {
        session()->forget('user');
        return redirect('/login');
    }
}
