<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\Hub;
use Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $config = $this->config();
        //get all user in database
        $template = 'admin.home.index';
        return view('admin.layout')->with(['template' => $template, 'config' => $config]);
    }
    private function config()
    {
        return [
            'js' => [
                '/backend/js/plugins/flot/jquery.flot.js',
                '/backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                '/backend/js/plugins/flot/jquery.flot.spline.js',
                '/backend/js/plugins/flot/jquery.flot.resize.js',
                '/backend/js/plugins/flot/jquery.flot.pie.js',
                '/backend/js/plugins/flot/jquery.flot.symbol.js',
                '/backend/js/plugins/flot/jquery.flot.time.js',
                '/backend/js/plugins/peity/jquery.peity.min.js',
                '/backend/js/demo/peity-demo.js',
                '/backend/js/inspinia.js',
                '/backend/js/plugins/pace/pace.min.js',
                '/backend/js/plugins/jquery-ui/jquery-ui.min.js',
                '/backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                '/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                '/backend/js/plugins/easypiechart/jquery.easypiechart.js',
                '/backend/js/plugins/sparkline/jquery.sparkline.min.js',
                '/backend/js/demo/sparkline-demo.js',

            ]
        ];
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function management()
    {
        $user_id = Auth::user()->id;
        //get locations of user by searching user_id in user_location table
        $locations = Location::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        $hubs = Hub::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        //use pivot table to get number of hubs in a location
        //dd($locations);

        return view('admin.management')->with(['locations' => $locations]);
    }
}
