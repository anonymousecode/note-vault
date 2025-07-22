<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        return redirect('/')->with('success', 'Registration successful!');
    }

    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)){
            
            Auth::login($user);
            return redirect('/dashboard')->with('success', 'Login successful!');
        }
        else{

            return back()->with('fail', 'Invalid credentials, try again');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully!');
    }
}
