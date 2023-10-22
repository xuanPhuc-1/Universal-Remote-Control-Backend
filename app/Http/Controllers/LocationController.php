<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    //
    public function index()
    {
        $template = 'admin.locations.index';
        $locations = DB::table('locations')->get();
        return view('admin.layout')->with(['template' => $template, 'locations' => $locations]);
    }

    public function create()
    {
        $template = 'admin.locations.create';
        return view('admin.layout')->with(['template' => $template]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

    public function edit($id)
    {
        $template = 'admin.locations.edit';
        return view('admin.layout')->with(['template' => $template]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        dd($data);
    }

    public function destroy(Request $request)
    {
        $location = Location::find($request->location_delete_id);
        if ($location) {
            $location->delete();
            return redirect()->route('admin.locations.index')->with('success', 'Room deleted successfully');
        }
        return redirect()->route('admin.locations.index')->with('error', 'Room not found');
    }

    public function show($id)
    {
        $template = 'admin.locations.show';
        return view('admin.layout')->with(['template' => $template]);
    }
}
