<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function getImageDeviceCategory($filename)
    {
        // Trả về hình ảnh từ storage/device_categories
        $filename = $filename . '.jpg';
        //if the operation is Windows, use this code
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $storage_path = public_path('storage\\categories') . '\\' . $filename;
        } else {
            //if the operation is Linux, use this code
            $storage_path = public_path('storage/categories') . '/' . $filename;
        }
        //dd($storage_path);
        //if image file exists, return it
        if (File::exists($storage_path)) {
            return response()->file($storage_path);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Image not found'
            ]);
        }
    }
}
