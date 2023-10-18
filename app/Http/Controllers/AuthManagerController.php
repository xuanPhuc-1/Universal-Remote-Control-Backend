<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class AuthManagerController extends Controller
{
    //

    public function login()
    {
        return view('auth.login');
    }

    function authenticate(Request $request)
    {
        //check if the email and password is correct
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        //if not, return to login page with error message
        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
        $credentials = $request->only('email', 'password');
        //if correct, return to dashboard
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return view('auth.message')->with('error', 'You have not admin access');
            }
        } else {
            //if not, return to login page with error message
            return redirect()->route('login')->withErrors('Email or password is incorrect');
        }
    }
    public function register()
    {
        return view('auth.registration');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6',
        ]);
        //make sure email is unique. if not, return to register page with error message
        if ($validator->fails()) {
            return redirect()->route('admin.register')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        $user = new User([
            'name' => $data['name'],
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
