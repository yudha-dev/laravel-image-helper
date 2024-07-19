<?php

namespace YudhaDev\LaravelImageHelper\Helpers;

use Illuminate\Support\Facades\File;

class ImageHelper
{
    public static function upload($file, $path)
    {
        $publicPath = base_path('public/' . $path);

        // Membuat direktori jika belum ada
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0777, true, true);
        }

        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($publicPath, $imageName);

        return $imageName;
    }

    public static function deleteImage($imageName)
    {
        $imagePath = base_path('public/' . $imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
