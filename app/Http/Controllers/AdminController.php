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
        return view('admin.dashboard');
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
