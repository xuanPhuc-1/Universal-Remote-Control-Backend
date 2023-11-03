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
use DB;

class LocationController extends Controller
{
    //


    public function index()
    {
        //return all locations of user
        $locations = Location::whereHas('users', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        //get all device categories in database
        $deviceCategories = DB::table('device_categories')->get();
        return response()->json([
            'success' => true,
            'user' => Auth::user(),
            'locations' => $locations,
            'deviceCategories' => $deviceCategories
        ]);
    }

    public function create(Request $request)
    {
        $request->all();
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

    public function getInformation($id)
    {
        //get the hub id of the location
        $location = Location::find($id);
        $hub = Hub::whereHas('locations', function ($query) use ($location) {
            $query->where('location_id', $location->id);
        })->first();
        //get the MAC address of the hub
        $hub_mac_address = $hub->MAC_address;
        //get the latest row in sensors table which have device_id == mac_address
        $sensors = DB::table('sensors')->where('device_id', $hub_mac_address)->orderBy('id', 'desc')->first();
        return response()->json([
            'success' => true,
            'hub' => $hub_mac_address,
            'sensors' => $sensors
        ]);
    }
}
