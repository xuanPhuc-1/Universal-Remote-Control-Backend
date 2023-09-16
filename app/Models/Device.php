<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $timestamps = true;

    protected $table = 'devices';
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'connection_state',
        'enabled',
        'device_to_cloud_messages',
        'cloud_to_device_messages',
        'last_message',
        'desired',
        'reported',
        'modified_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sensor_data()
    {
        return $this->hasMany(Sensor_Data::class);
    }
}
