<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    use HasFactory;

    protected $table = "hubs";

    protected $fillable = [
        "id",
        "MAC_address",
        "name",
        "user_id",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_hub', 'hub_id', 'user_id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'hub_location', 'hub_id', 'location_id');
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
