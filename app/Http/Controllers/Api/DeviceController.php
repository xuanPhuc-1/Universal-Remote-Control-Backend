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
        //get device category which device belongs to
        $device_category = DeviceCategory::find($id);
        $ir_codes = $device_category->ir_codes;

        //get the location of the device category
        $location = Location::whereHas('deviceCategories', function ($query) use ($id) {
            $query->where('device_category_id', $id);
        })->first();
        $location_id = $location->id;
        //from hub_location and device_category_location table, get the hub in same location with device category and get the MAC address of the hub
        $hub = Hub::whereHas('locations', function ($query) use ($location_id) {
            $query->where('location_id', $location_id);
        })->first();
        $hub_mac_address = $hub->MAC_address;

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
            'data' => $devices,
            'ir_codes' => $ir_codes,
            'MAC' => $hub_mac_address
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
