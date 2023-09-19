<?php

namespace App\Http\Controllers;

use App\Models\Sensor_Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function index()
    {
        print("Hello World");
    }
    public function store(Request $request)
    {
        $sensor_data = $request->validate([
            'device_id' => 'required',
            'data' => 'required'
        ]);
        $sensor_data['device_id'] = $request->device_id;
        $sensor_data['data'] = $request->data;
        //Sensor_Data::create($sensor_data);
        return response()->json([
            'message' => 'success'
        ], 200);
    }
    public function show($id)
    {
        // //$sensor_data = Sensor_Data::find($id);
        // return response()->json([
        //     'message' => 'success',
        //     //'data' => $sensor_data
        // ], 200);
    }
}
