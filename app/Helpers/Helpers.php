<?php

use PHPOpenSourceSaver\JWTAuth\Providers\Auth\Illuminate;
use Illuminate\Support\Facades\Cache;

if (!function_exists('isOnline')) {
    function isOnline($id)
    {
        if (Cache::has('user-is-online-' . $id))
            return 'user_online';
        else
            return 'user_offline';
    }
}
