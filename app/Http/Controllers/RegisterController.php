<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('backend.auth.register');
    }

    public function saveRegister(Request $request) 
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:users,name'],
            'email' => ['required','max:255', 'unique:users,email'],
            'role' => ['required'],
            'password' => ['required','min:8'],
            'password_confirmation' => ['required','min:8']
        ]);
        // $users = UsersRepository::store($request);
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);
    return view('backend.auth.login');
    }
}
