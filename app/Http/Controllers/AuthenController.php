<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthenController extends Controller
{
    public function showlogin()
    {
        if (!Auth::check()) {
            return view('authen.login');
        }
        elseif (Auth::user()->role == 'Admin')
        {
            return redirect()->route('motor.index');
        } else {
            return redirect()->route('transaction.index');
        }


    }

    public function proseslogin( Request $request)
    {
        $this->validate($request, [
            'email'     => ['required', 'string'],
            'password'  => ['required', 'string']
        ]);

        $user = Users::where('email', $request->input('email'))->first();
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);

            if (Auth::user()->role == 'Admin') {
                return redirect()->intended('/user')->with('Success', 'You have successfully logged in');
            } else {
                return redirect()->intended('/transaction')->with('Success', 'You have successfully logged in');
            }
        } else {
            return redirect()->route('login')->with('Failed', 'Invalid login credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('Success', 'You vae successfully logged out');
    }
}
