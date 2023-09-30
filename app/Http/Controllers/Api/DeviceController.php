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
    public function index()
    {
        $hub = Hub::whereHas('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->first();
        //select all device categories have hub_id = $hub->id
        $device_category = $hub->deviceCategories;
        //return all devices have device_category_id = $device_category->id
        $devices = $device_category->devices;
        return response()->json([
            'success' => true,
            'message' => 'List Devices',
            'data' => $devices
        ], 200);
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
        $device = new Device();
        $device->name = $request->device_name;
        //find the id of the device category
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
