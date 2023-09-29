<?php

namespace App\Http\Controllers\Api;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Hub;
use League\Flysystem\Adapter\Local;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    //


    public function index()
    {
        //return all locations of user
        $locations = Location::whereHas('users', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        return response()->json([
            'success' => true,
            'locations' => $locations
        ]);
    }

    public function create(Request $request)
    {
        $request->all();
        //check if location name is unique
        //create new location else use existing location 

        // if (Location::where('name', $request->input('name'))->exists()) {
        //     $location = Location::where('name', $request->input('name'))->first();
        //     $hub = Hub::whereHas('users', function ($query) {
        //         $query->where('user_id', Auth::user()->id);
        //     })->orderBy('id', 'desc')->first();
        //     $hub->locations()->attach($location->id);
        //     $location->users()->attach(Auth::user()->id);
        // } else {
        $location = new Location();
        $location->name = $request->input('location_name');
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
        //}
        //return redirect()->route('management');
        // return response()->json([
        //     'success' => true,
        //     'location' => $location,
        //     'hub' => $hub,
        //     'user' => Auth::user(),
        //     'message' => 'location created'
        // ]);
        return $location;
    }

    public function update(Request $request)
    {
        $location = Location::find($request->input('location_id'));
        if (Auth::user()->id != $location->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $location->name = $request->name;
        $location->update();
        $hub = Hub::whereHas('users', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->orderBy('id', 'desc')->first();
        $hub->locations()->attach($location->id);
        $location->users()->attach(Auth::user()->id);
        return response()->json([
            'success' => true,
            'message' => 'location edited'
        ]);
    }

    public function delete(Request $request)
    {
        $location = Location::find($request->id);
        // check if user is editing his own post
        if (Auth::user()->id != $location->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        //check if post has photo to delete
        if ($location->photo != '') {
            Storage::delete('public/posts/' . $location->photo);
        }
        $location->delete();
        return response()->json([
            'success' => true,
            'message' => 'location deleted'
        ]);
    }
}
