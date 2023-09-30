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
        'hub_id',
    ];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function hubs()
    {
        return $this->belongsTo(Hub::class);
    }
}
