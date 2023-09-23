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
        //check if location name is unique
        //create new location else use existing location 

        if (Location::where('name', $request->input('name'))->exists()) {
            $location = Location::where('name', $request->input('name'))->first();
            $hub = Hub::whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->orderBy('id', 'desc')->first();
            $hub->locations()->attach($location->id);
            $location->users()->attach(Auth::user()->id);
        } else {
            $location = new Location();
            $location->name = $request->input('name');
            //validate request->input('name'). If it is not unique, use that existing location name
            //select the newest hub_id from user_hub table where user_id = auth()->user()->id
            $hub = Hub::whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->orderBy('id', 'desc')->first();
            //save hub_id in location table
            $location->save();
            //save hub_id and user_id in user_hub table
            $hub->locations()->attach($location->id);
            $location->users()->attach(Auth::user()->id);
        }
        return redirect()->route('management');
    }

    public function show($id)
    {
        print("Location show");
    }
}
