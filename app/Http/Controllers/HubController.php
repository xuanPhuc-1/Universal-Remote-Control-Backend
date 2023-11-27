<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HubController extends Controller
{
    //
    public function index()
    {
        #select all hub
        $hubs = DB::table('hubs')->get();
        $template = 'admin.hub.index';
        return view('admin.layout')->with(['template' => $template, 'hubs' => $hubs]);
    }
}
