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
        'ir_code',
        'user_id',
    ];

    public function deviceCategory()
    {
        return $this->belongsTo(DeviceCategory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_device', 'device_id', 'user_id');
    }
}
