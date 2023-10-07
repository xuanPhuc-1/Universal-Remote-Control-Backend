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
    public function index($id)
    {
        //return all devices of device Category
        $devices = Device::where('device_category_id', $id)->get();
        //check if device category exists in database
        if (!DeviceCategory::find($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Device Category not found',
                'data' => ''
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $devices
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
