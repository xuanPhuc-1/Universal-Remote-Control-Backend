<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'device_id',
        'humidity',
        'temperature'
    ];
    protected $table = "sensors";
    public $timestamps = true;
}
