<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Hub;
use Illuminate\Http\Request;
use App\Models\User;

class HubController extends Controller
{
    //
    public function index()
    {
        print("Hub index");
    }

    public function create()
    {
        //select all hubs
        $hubs = Hub::all();
        return view('hub.chooseDevice')->with('hubs', $hubs);
    }

    public function store(Request $request)
    {
        $request->all();
        //find hub id by name from request 
        $hub = Hub::where('name', $request->input('hubs'))->first();
        //find user id from auth
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        //save hub_id and user_id in user_hub table
        $hub->users()->attach($user_id);
        //return view('location.createForm')->with(['hub' => $request->input('hubs'), 'user' => $user]);
        return response()->json([
            'success' => true,
            'message' => 'Hub added successfully, create link between hub and user'
        ]);
    }
    public function update(Request $request)
    {
    }
}
