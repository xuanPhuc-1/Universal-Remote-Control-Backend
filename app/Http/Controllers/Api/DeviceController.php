<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hub;
use App\Models\Location;
use App\Models\DeviceCategory;
use App\Models\Device;

class DeviceController extends Controller
{
    //
    public function index($device_category_id)
    {
        //return all devices of device category
        $devices_supported = Device::where('device_category_id', $device_category_id)->get();
        //return all devices of device category of user in location
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //get all devices of device category belong to user
        $devices = $user->devices()->where('device_category_id', $device_category_id)->get();
        //hub of this location belong to user
        $location = Location::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->first();
        $hub = Hub::whereHas('locations', function ($query) use ($location) {
            $query->where('location_id', $location->id);
        })->first();
        $mac = $hub->MAC_address;

        return response()->json([
            'success' => true,
            'devices_supported' => $devices_supported,
            'devices_of_user' => $devices,
            'MAC' => $mac,
        ]);
    }

    public function show($id)
    {
        $device = Device::find($id);

        if ($device) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Device',
                'data' => $device
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device Tidak Ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $device = Device::find($request->device_id);
        $device = new Device();
        $device->name = $request->device_name;
        $device->ir_codes = $request->ir_codes;
        if (!DeviceCategory::where('name', $request->device_category)->first()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot find device category',
                'data' => ''
            ], 404);
        }
        $device_category = DeviceCategory::where('name', $request->device_category)->first();
        $device->device_category_id = $device_category->id;

        $device->save();

        return response()->json([
            'success' => true,
            'message' => 'Add Device Success',
            'device' => $device
        ], 200);
    }

    public function add(Request $request)
    {
        #attach user to device 
        $user_id = auth()->user()->id;
        $device_name = $request->device_name;
        $device = Device::where('name', $device_name)->first();
        #dd($device);
        #find a pair with user_id and device_id in table user_device
        $device_user = $device->users()->where('user_id', $user_id)->first();

        //check if found device and this device is not attached to user return response true
        if ($device && !$device_user) {
            $device->users()->attach($user_id);
            return response()->json([
                'success' => true,
                'message' => 'Add Device Success',
                'data' => $device
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device already added',
            ], 404);
        }
    }

    public function delete($id)
    {
        $device = Device::find($id);

        if ($device) {
            $device->delete();
            return response()->json([
                'success' => true,
                'message' => 'Delete Device Success',
                'data' => $device
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device with id ' . $id . ' not found',
                'data' => ''
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $device = Device::find($id);

        if ($device) {
            $device->name = $request->device_name;
            $device->save();
            return response()->json([
                'success' => true,
                'message' => 'Update Device Success',
                'data' => $device
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device with id ' . $id . ' not found',
                'data' => ''
            ], 404);
        }
    }
}
