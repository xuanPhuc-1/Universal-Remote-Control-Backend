<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubController extends Controller
{
    //
    public function index()
    {
        $template = 'hub.index';
        return view('hub.layout')->with(['template' => $template]);
    }
}
