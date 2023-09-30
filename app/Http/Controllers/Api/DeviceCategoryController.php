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
        //get all hub of user
        $hub = Hub::whereHas('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->first();
        //select all device categories have hub_id = $hub->id
        $hub = $hub->deviceCategories;


        return response()->json([
            'success' => true,
            'message' => 'List Device Categories',
            'categories' => $hub
        ], 200);
    }

    public function create(Request $request)
    {
        $device_category = new DeviceCategory();
        $device_category->name = $request->device_category_name;
        //find the id of the hub
        //if the hub is not found, return error
        if (!Hub::where('name', $request->hub_name)->first()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot find hub',
                'data' => ''
            ], 404);
        }
        $hub = Hub::where('name', $request->hub_name)->first();
        $device_category->hub_id = $hub->id;

        //check if device category name and hub_id is unique
        if (DeviceCategory::where('name', $request->device_category_name)->where('hub_id', $hub->id)->first()) {
            return response()->json([
                'success' => false,
                'message' => 'Device Category Name and Hub ID already exists',
                'data' => ''
            ], 404);
        }
        $device_category->save();

        return response()->json([
            'success' => true,
            'message' => 'Device Category Added Successfully',
            'data' => $device_category
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $device_category = DeviceCategory::find($id);

        if ($device_category) {
            $device_category->name = $request->device_category_name;
            //find the id of the hub
            //if the hub is not found, return error
            if (!Hub::where('name', $request->hub_name)->first()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot find hub',
                    'data' => ''
                ], 404);
            }
            $hub = Hub::where('name', $request->hub_name)->first();
            $device_category->hub_id = $hub->id;
            $device_category->save();

            return response()->json([
                'success' => true,
                'message' => 'Device Category Updated Successfully',
                'data' => $device_category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device Category Not Found',
                'data' => ''
            ], 404);
        }
    }

    public function delete($id)
    {
        $device_category = DeviceCategory::find($id);

        if ($device_category) {
            $device_category->delete();
            return response()->json([
                'success' => true,
                'message' => 'Device Category Deleted Successfully',
                'data' => $device_category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device Category Not Found',
                'data' => ''
            ], 404);
        }
    }

    public function show($id)
    {
        $device_category = DeviceCategory::find($id);

        if ($device_category) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Device Category',
                'data' => $device_category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device Category Not Found',
                'data' => ''
            ], 404);
        }
    }

    public function showDevices($id)
    {
        $device_category = DeviceCategory::find($id);

        if ($device_category) {
            $devices = $device_category->devices;
            return response()->json([
                'success' => true,
                'message' => 'List Devices',
                'data' => $devices
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Device Category Not Found',
                'data' => ''
            ], 404);
        }
    }
}
