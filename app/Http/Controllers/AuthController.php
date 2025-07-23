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
            'security'=>$request->security,
            'answer'=>$request->answer,
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

    function changePassword(Request $request){

        $user = Auth::user();

        if (Hash::check($request->current,$user->password)){
            if($request->new === $request->confirm){

                $user->password = bcrypt($request->new);
                $user->save();
                return redirect('/')->with('success', 'Password changed successfully!');
            }
            else{
                return back()->with('fail', 'New password and confirmation do not match.');
            }       
        }
        else{
            return back()->with('fail', 'Current password is incorrect.');
        }

    }

    function resetPassword(Request $request){

        $user = User::where('email', $request->email)->first();

        if($user && $user->security === $request->security && $user->answer === $request->answer){

            if($request->new === $request->confirm){

                $user->password = bcrypt($request->new);
                $user->save();
                return redirect('/')->with('success', 'Password reset successfully!');
            }
            else{
                return back()->with('fail', 'New password and confirmation do not match.');
            }
        }
        else{
            return back()->with('fail', 'Invalid security question or answer.');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully!');
    }
}
