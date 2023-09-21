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
        'hub_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_location', 'location_id', 'user_id');
    }

    public function hubs()
    {
        return $this->hasMany(Hub::class, 'id');
    }

    public function getHubCountAttribute()
    {
        return $this->hubs()->count();
    }
}
