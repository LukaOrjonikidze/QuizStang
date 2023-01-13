<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {   
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $credentials["password"] = Hash::make($credentials["password"]);
        $credentials["name"] = "admin";
        User::create($credentials);
        return redirect(route("login"));
    }
    public function loginPage()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $user = User::where('email', $credentials["email"])->first();
        
        
        if (Hash::check($credentials["password"], $user->password)){
            Auth::login($user);
            return redirect()->route("home");
        }
        return back()->withError();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect("/login");
    }

}
