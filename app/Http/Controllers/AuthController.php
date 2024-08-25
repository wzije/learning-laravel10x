<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view("auths.register", [
            "title" => "Register",
            "active" => "register",
        ]);
    }

    public function loginForm()
    {
        return view("auths.login", [
            "title" => "Login",
            "active" => "login",
        ]);
    }

    public function register(Request $request)
    {

        $validatedData = $request->validate([
            "name" => "required|min:3|max:50",
            "username" => ["required", "min:3", "max:50", "unique:users"],
            "email" => ["required", "email"],
            "password" => ["required", "min:6", "confirmed"],
        ]);

        $validatedData['password'] = bcrypt($validatedData["password"]);

        User::create($validatedData);

        return redirect("/login")->with("success", "Registration successfully. Please Login.");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', "min:6"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
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

        return redirect('/');
    }
}
