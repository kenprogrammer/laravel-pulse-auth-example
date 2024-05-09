<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show login page
     */
    public function showLogin()
    {
        if(Auth::check()){
            return redirect('/');
        }

        return view('pulse-auth.pages.login');
    }

    /**
     * Authenticate user
     */
    public function authenticate(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ],
        [
            'username.required'=>'Username is required!',
            'password.required'=>'Password is required!'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
