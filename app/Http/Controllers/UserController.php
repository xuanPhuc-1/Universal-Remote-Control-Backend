<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        DB::table('users')->insert($data);
        return redirect()->route('users.index');
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
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.index');
    }
}
