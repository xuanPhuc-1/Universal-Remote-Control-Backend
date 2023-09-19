<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Hub;
use League\Flysystem\Adapter\Local;

class LocationController extends Controller
{
    //
    public function index()
    {
        print("Location index");
    }

    public function create()
    {


        //return view('location.createForm');
    }

    public function store(Request $request)
    {
        $request->all();
        //save location name = request->input('name')
        $location = new Location();
        $location->name = $request->input('name');
        $location->save();
        $location = Location::where('name', $request->input('name'))->first();
        //find user id from auth
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        //save hub_id and user_id in user_hub table
        $location->users()->attach($user_id);
        dd($request);
    }

    public function show($id)
    {
        print("Location show");
    }
}
