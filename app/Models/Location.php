<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Location extends Model
{
    use HasFactory;

    protected $table = "locations";

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_location', 'location_id', 'user_id');
    }

    public function hubs()
    {
        return $this->belongsToMany(Hub::class, 'hub_location', 'location_id', 'hub_id');
    }

    public function deviceCategories()
    {
        return $this->belongsToMany(DeviceCategory::class, 'device_catgory_location', 'location_id', 'device_category_id');
    }
}
