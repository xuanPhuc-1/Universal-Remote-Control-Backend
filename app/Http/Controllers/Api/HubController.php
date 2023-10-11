<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Models\Hub;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Http\Controllers\Api\LocationController;

class HubController extends Controller
{
    //
    public function index()
    {
        print("Hub index");
        //return all hubs of user
    }

    public function create()
    {
        //select all hubs
        $hubs = Hub::all();
        return view('hub.chooseDevice')->with('hubs', $hubs);
    }

    public function pick(Request $request)
    {
        $photo = '';
        $request->all();
        //find hub id by MAC from request if not found return response false to user

        $hub = Hub::where('MAC_address', $request->input('mac'))->first();
        if (!$hub) {
            return response()->json([
                'success' => false,
                'message' => 'Hub not found'
            ]);
        }

        //check if location name and user_id is unique
        if (Location::where('name', $request->input('location_name'))->whereHas('users', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->first()) {
            $location = Location::where('name', $request->input('location_name'))->whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->first();
            if ($request->photo != '') {
                $photo = time() . '.jpg';
                file_put_contents('storage/locations/' . $photo, base64_decode($request->photo));
                $location->photo = $photo;
            }
            $hub->locations()->attach($location->id);
            $location->users()->attach(Auth::user()->id);
        } else {
            $location = new Location();
            $location->name = $request->input('location_name');
            //validate request->input('name'). If it is not unique, use that existing location name
            //select the newest hub_id from user_hub table where user_id = auth()->user()->id
            //save hub_id in location table
            if ($request->photo != '') {
                $photo = time() . '.jpg';
                file_put_contents('storage/locations/' . $photo, base64_decode($request->photo));
                $location->photo = $photo;
            }
            $location->save();
            //save hub_id and user_id in user_hub table
            $hub->locations()->attach($location->id);
            $location->users()->attach(Auth::user()->id);
        }
        //find user id from auth
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $locations = Location::whereHas('users', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        //save hub_id and user_id in user_hub table
        ///check if pair user and hub already exists in user_hub table
        $user_hubs = $user->hubs()->get();
        foreach ($user_hubs as $user_hub) {
            if ($user_hub->id == $hub->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hub already added to your home'
                ]);
            }
        }

        $hub->users()->attach($user_id);
        return response()->json([
            'success' => true,
            'hub' => $hub,
            'user' => $user,
            'locations' => $locations,
            'message' => 'Hub added successfully, create link between hub and user'
        ]);
    }
    public function update(Request $request)
    {
    }
}
