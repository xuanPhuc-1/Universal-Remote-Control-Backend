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
    public function index($id)
    {
        //return all device categories of location
        $deviceCategories = DeviceCategory::whereHas('locations', function ($query) use ($id) {
            $query->where('location_id', $id);
        })->get();
        return response()->json([
            'success' => true,
            'data' => $deviceCategories
        ]);
    }

    public function getCommandParameters($id)
    {
        //get hub mac address in same location as device category
        $hub = Hub::whereHas('locations', function ($query) use ($id) {
            $query->whereHas('deviceCategories', function ($query) use ($id) {
                $query->where('device_category_id', $id);
            });
        })->first();
        //get all devices in device category
        $devices = Device::where('device_category_id', $id)->get();
        //return hub mac address and devices
        return response()->json([
            'success' => true,
            'hub' => $hub,
            'devices' => $devices
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
        //update device category name
        $deviceCategory = DeviceCategory::find($id);
        $deviceCategory->name = $request->input('device_category_name');
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
