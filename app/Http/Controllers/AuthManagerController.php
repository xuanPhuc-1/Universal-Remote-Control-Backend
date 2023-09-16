<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class AuthManagerController extends Controller
{
    //

    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'You have been logged in');
        }
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }
    public function register()
    {
        return view('auth.registration');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->save();
        Auth::login($user);
        if (!$user) {
            return redirect()->route('register')->with('error', 'Something went wrong');
        }
        return redirect()->route('welcome')->with('success', 'You have been registered');
    }
    public function forgot()
    {
        return view('auth.forgot');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out');
    }
}
