<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DevicesController extends Controller
{
    //
    public function index()
    {
        //return view('devices.index')->with('devices', Device::all());
    }

    public function create()
    {
        return view('devices.createForm');
    }
    public function store(Request $request)
    {
        // Kiểm tra xem dữ liệu từ client gửi lên bao gốm những gì
        //dd($request);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        //user id is current log in user
        $data['user_id'] = Auth::id();
        if ($request->connection_state == "on") {
            $data['connection_state'] = 1;
        } else {
            $data['connection_state'] = 0;
        }
        if ($request->enabled == "on") {
            $data['enabled'] = 1;
        } else {
            $data['enabled'] = 0;
        }
        // Tạo mới user với các dữ liệu tương ứng với dữ liệu được gán trong $data
        //Device::create($data);
        echo "success create create";
        return redirect()->route('devices.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
