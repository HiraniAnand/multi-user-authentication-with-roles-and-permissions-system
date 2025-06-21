<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function home() {
        return view('welcome');
    }

    public function register_view() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('welcome');
        }

        return redirect('register')->withInput()->withError('Registered Details are not Valid!');
    }

    public function login(Request $request) {
        $request->validator([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('welcome');
        }

        return redirect('login')->withInput()->withErrors('Login Details are not Valid!');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('');
    }
}