<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenController extends Controller
{
    public function showlogin(){
        return view('authen.login');
    }

    public function proseslogin(Request $request){
        $request->validate([
            'email'     => 'required|string',
            'password'  => 'required|string',
        ]);

        $user = Users::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);

            if (Auth::user()->role == 'Admin') {
                return redirect()->intended('/admindashboard')->with('success', 'You have Successfully Loggedin');
            } else {
                return redirect()->intended('/cashierdashboard')->with('success', 'You have Successfully loggedin');
            }
        } else {
            return redirect()->route('login')->with('success', 'Invalid login credentials');
        }
    }
    
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
