<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;

class UserController extends Controller
{
    //
    public function index()
    {
        $template = 'admin.users.index';
        $users = DB::table('users')->get();
        //dd($users);
        return view('admin.layout')->with(['template' => $template, 'users' => $users]);
    }
    public function create()
    {
        $template = 'admin.users.create';
        return view('admin.layout')->with(['template' => $template]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6',
        ]);
        //make sure email is unique. if not, return to register page with error message
        if ($validator->fails()) {
            return redirect()->route('users.create')
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
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    public function edit($id)
    {
        $template = 'admin.users.edit';
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.layout')->with(['template' => $template, 'user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('users.index');
    }
    public function destroy(Request $request)
    {
        $user = User::find($request->user_delete_id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        }
        return redirect()->route('users.index')->with('error', 'User not found');
    }

    public function showLocation($id)
    {
        $template = 'admin.users.locations';
        $user = DB::table('users')->where('id', $id)->first();
        //get all location of user by searching table id user_location table and get all information of these locations
        $locations = DB::table('user_location')->where('user_id', $id)->join('locations', 'user_location.location_id', '=', 'locations.id')->get();


        //dd($locations);
        return view('admin.layout')->with(['template' => $template, 'locations' => $locations, 'user' => $user]);
    }
    public function setRole($id)
    {
        $user = User::find($id);
        //if user is admin, send error message redirect back
        if ($user->role == 'admin') {
            return redirect()->back()->with('error', 'User is already admin');
        }
        $user->role = 'admin';
        $user->save();
        return redirect()->route('users.index')->with('success', 'User role updated successfully');
    }
}
