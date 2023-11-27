<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceCategoryController extends Controller
{
    //
    public function index()
    {
        $deviceCategories = DB::table('device_categories')->get();
        $template = 'admin.device-cate.index';
        return view('admin.layout')->with(['template' => $template, 'deviceCates' => $deviceCategories]);
    }
    public function create()
    {
        $template = 'admin.device-cate.create';
        return view('admin.layout')->with(['template' => $template]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:device_categories,name',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            // user time for photo name to prevent name duplication
            $photo = time() . '.jpg';
            // decode photo string and save to storage/locations
            $request->photo->move(public_path('storage/categories'), $photo);
        }
        DB::table('device_categories')->insert([
            'name' => $request->input('name'),
            'photo' => $photo,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.device-category.index')->with('success', 'Device category created successfully.');
    }
}
