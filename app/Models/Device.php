<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = "devices";
    protected $fillable = [
        'name',
        'device_category_id',
    ];

    public function deviceCategory()
    {
        return $this->belongsTo(DeviceCategory::class);
    }
}
