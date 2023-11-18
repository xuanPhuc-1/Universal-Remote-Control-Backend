<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hub;
use App\Models\Location;
use App\Models\DeviceCategory;
use App\Models\Device;
use Illuminate\Support\Facades\DB;

class DeviceCategoryController extends Controller
{
    //
    public function index($id)
    {
        $location = Location::find($id);
        $hub = Hub::whereHas('locations', function ($query) use ($location) {
            $query->where('location_id', $location->id);
        })->first();
        //get the MAC address of the hub
        $hub_mac_address = $hub->MAC_address;
        //get the latest row in sensors table which have device_id == mac_address
        $sensors = DB::table('sensors')->where('device_id', $hub_mac_address)->orderBy('id', 'desc')->first();
        //return all device categories of location
        $deviceCategories = DeviceCategory::whereHas('locations', function ($query) use ($id) {
            $query->where('location_id', $id);
        })->get();
        //get all devices of device category
        $devices = Device::where('device_category_id', $id)->get();
        //check if location has hub attached or not
        $location = Location::find($id);
        $hub = Hub::whereHas('locations', function ($query) use ($id) {
            $query->where('location_id', $id);
        })->first();
        if ($hub) {
            return response()->json([
                'success' => true,
                'data' => $deviceCategories,
                'devices' => $devices,
                'sensor' => $sensors,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No hub attached to this location'
            ]);
        }
    }


    public function create(Request $request)
    {
        $deviceCategory = new DeviceCategory();
        $deviceCategory->name = $request->input('device_category_name');
        $photo = '';
        //check if user provided photo
        if ($request->hasFile('photo')) {
            // user time for photo name to prevent name duplication
            $photo = time() . '.jpg';
            // decode photo string and save to storage/profiles
            $request->photo->move(public_path('storage/categories'), $photo);
            $deviceCategory->photo = $photo;
        }
        $deviceCategory->save();
        //return response true to user
        return response()->json([
            'success' => true,
            'data' => $deviceCategory,
            'message' => 'Device category created'
        ]);
    }
    public function add(Request $request)
    {
        $request->all();
        //check find the location id by the location_name in request
        $location = Location::where('name', $request->input('location_name'))->orderBy('id', 'desc')->first();
        //check if location exists in database use attach the location_id to the device_category to the device_category_location table
        if ($location) {
            $deviceCategory = new DeviceCategory();
            $deviceCategory->name = $request->input('device_category_name');
            //if the category already exists in the database, do not create a new one use the existing one

            if (DeviceCategory::where('name', $request->input('device_category_name'))->first()) {
                $deviceCategory = DeviceCategory::where('name', $request->input('device_category_name'))->first();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Device category not support'
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
            'data' => $deviceCategory,
            'location' => $location,
            'message' => 'Device category was linked to location'
        ]);
    }

    public function update(Request $request, $id)
    {
        //update device category name
        $deviceCategory = DeviceCategory::find($id);
        $deviceCategory->name = $request->input('device_category_name');
        $photo = '';
        if ($request->hasFile('photo')) {
            // user time for photo name to prevent name duplication
            $photo = time() . '.jpg';
            // decode photo string and save to storage/profiles
            file_put_contents('storage/categories/' . $photo, base64_decode($request->photo));
            $deviceCategory->photo = $photo;
        }
        $deviceCategory->save();
        //return response true to user
        return response()->json([
            'success' => true,
            'message' => 'Device category updated'
        ]);
    }

    public function delete($id)
    {
        //delete device category
        $deviceCategory = DeviceCategory::find($id);
        $deviceCategory->delete();
        //return response true to user
        return response()->json([
            'success' => true,
            'message' => 'Device category deleted'
        ]);
    }

    public function show($id)
    {
        //return device category by id
        $deviceCategory = DeviceCategory::find($id);
        return response()->json([
            'success' => true,
            'data' => $deviceCategory
        ]);
    }

    public function showDevices($id)
    {
        //return all devices of device category
        $devices = Device::where('device_category_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $devices
        ]);
    }
}
