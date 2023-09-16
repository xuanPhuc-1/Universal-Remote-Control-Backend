<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor_Data extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'sensor_data';
    protected $fillable = [
        'device_id',
        'data',
        'modified_at',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
