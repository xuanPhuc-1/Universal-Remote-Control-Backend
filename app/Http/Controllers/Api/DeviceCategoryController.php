<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hub;
use App\Models\Location;
use App\Models\DeviceCategory;
use App\Models\Device;

class DeviceCategoryController extends Controller
{
    //
    public function index()
    {
        //return all device categories of user sorted by location
        $deviceCategories = DeviceCategory::whereHas('locations', function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_id', Auth()->user()->id);
            });
        })->get();
        return response()->json([
            'success' => true,
            'data' => $deviceCategories
        ]);
    }

    public function create(Request $request)
    {
        $request->all();
        //check find the location id by the location_name in request
        $location = Location::where('name', $request->input('location_name'))->first();
        //check if location exists in database use attach the location_id to the device_category to the device_category_location table
        if ($location) {
            $deviceCategory = new DeviceCategory();
            $deviceCategory->name = $request->input('device_category_name');
            //check if the device category name is unique in the location
            if (DeviceCategory::where('name', $request->input('device_category_name'))->whereHas('locations', function ($query) use ($location) {
                $query->where('location_id', $location->id);
            })->first()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Device category name already exists in this location'
                ]);
            }
            $deviceCategory->save();
            $deviceCategory->locations()->attach($location->id);
        } else {
            //if location does not exist in database create new location
            $location = new Location();
            $location->name = $request->input('location_name');
            $location->save();
            //attach location_id to device_category_location table
            $deviceCategory = new DeviceCategory();
            $deviceCategory->name = $request->input('device_category_name');
            $deviceCategory->save();
            $deviceCategory->locations()->attach($location->id);
        }
        //return response true to user
        return response()->json([
            'success' => true,
            'message' => 'Device category created'
        ]);
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }

    public function show($id)
    {
    }

    public function showDevices($id)
    {
    }
}
