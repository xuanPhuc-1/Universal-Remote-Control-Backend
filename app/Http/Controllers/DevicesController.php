<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DevicesController extends Controller
{
    public function index()
    {
        $devices = DB::table('devices')->get();
        $template = 'admin.device.index';
        return view('admin.layout')->with(['template' => $template, 'devices' => $devices]);
    }
    public function create()
    {
        #select all device category
        $deviceCategories = DB::table('device_categories')->get();
        $template = 'admin.device.create';
        return view('admin.layout')->with(['template' => $template, 'deviceCategories' => $deviceCategories]);
    }
    public function store(Request $request)
    {
        #check if the category_id and name is exist, move to update
        $device = DB::table('devices')->where('device_category_id', $request->input('device_category_id'))->where('name', $request->input('name'))->first();
        if ($device) {
            #redirect to update with id of device
            return redirect()->route('admin.devices.index')->with('error', 'Device already exist.');
        }

        $request->validate([
            'name' => 'required|unique:devices,name',
            'ir_code' => 'required|json',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            // user time for photo name to prevent name duplication
            $photo = time() . '.jpg';
            // decode photo string and save to storage/locations
            $request->photo->move(public_path('storage/devices'), $photo);
        }
        DB::table('devices')->insert([
            'device_category_id' => $request->input('device_category_id'),
            'name' => $request->input('name'),
            'ir_codes' => $request->input('ir_code'),
            'photo' => $photo,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.devices.index')->with('success', 'Device created successfully.');
    }

    public function edit($id)
    {
        #select all device category
        $deviceCategories = DB::table('device_categories')->get();
        $device = DB::table('devices')->where('id', $id)->first();
        $template = 'admin.device.edit';
        return view('admin.layout')->with(['template' => $template, 'deviceCategories' => $deviceCategories, 'device' => $device]);
    }

    public function update(Request $request, $id)
    {
        #check if the category_id and name is exist, move to update
        $device = DB::table('devices')->where('device_category_id', $request->input('device_category_id'))->where('name', $request->input('name'))->first();
        if ($device) {
            return redirect()->route('admin.devices.index')->with('error', 'Device already exist.');
        }

        $request->validate([
            'name' => 'required|unique:devices,name',
            'ir_code' => 'required|json',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            // user time for photo name to prevent name duplication
            $photo = time() . '.jpg';
            // decode photo string and save to storage/locations
            $request->photo->move(public_path('storage/devices'), $photo);
        }
        DB::table('devices')->where('id', $id)->update([
            'device_category_id' => $request->input('device_category_id'),
            'name' => $request->input('name'),
            'ir_codes' => $request->input('ir_code'),
            'photo' => $photo,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.devices.index')->with('success', 'Device updated successfully.');
    }
}
