<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use Illuminate\Http\Request;

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
        //update user_id of hub in user_hub table

        $user_id = auth()->user()->id;
        $hubs->users()->attach($user_id);
        return view('hub.chooseDevice')->with('hubs', $hubs);
    }

    public function store(Request $request)
    {
        $request->all();
    }

    public function show($id)
    {
        print("Hub show");
    }
}
