<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceCategory extends Model
{
    use HasFactory;
    protected $table = "device_categories";
    protected $fillable = [
        'name',
        'location_id',
    ];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'device_category_location', 'device_category_id', 'location_id');
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
