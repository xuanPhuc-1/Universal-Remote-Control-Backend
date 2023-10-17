<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        //check if the email and password is correct
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            //check if user is admin
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                //return to welcome page with message register success. Wait for admin to approve
                return view('auth.message')->with('error', 'You have not admin access');
            }
        } else {
            return view('auth.message')->with('error', 'Email or password is incorrect');
        }
    }
    public function register()
    {
        return view('auth.registration');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $request->only('email', 'password');
        $data['password'] = bcrypt($data['password']);
        $user = new User([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $user->save();
        //return to welcome page with message register success. Wait for admin to approve
        return view('auth.message')->with('error', 'You have not admin access');
    }
    public function forgot()
    {
        //check if email is in database
        //if yes, send email to reset password
        //if no, return to login page with message

    }
    //logout
    public function logout()
    {

        Auth::logout();

        return redirect()->route('welcome');
    }
}
