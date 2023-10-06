<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;

use function Ramsey\Uuid\v1;

class AuthManagerController extends Controller
{
    //

    public function login()
    {
        return view('auth.login');
    }

    function authenticate(Request $req)
    {
        //password is hashed
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } else {
            return 'Username or password not matched';
        }
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
            'password' => $data['password'],
        ]);
        $user->save();
        Auth::login($user);
        if (!$user) {
            return redirect()->route('register')->with('error', 'Something went wrong');
        }
        return redirect()->route('dashboard')->with('success', 'You have been registered');
    }
    public function forgot()
    {
        return view('auth.forgot');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out');
    }
}
