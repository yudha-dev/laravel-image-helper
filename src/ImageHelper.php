<?php

namespace Yudhadev\LaravelImageHelper;

class ImageHelper
{
    public static function upload($file, $path)
    {
        // Membuat direktori jika belum ada
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }

        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $imageName);

        return $imageName;
    }

    public static function deleteImage($imageName)
    {
        if (file_exists(public_path($imageName))) {
            unlink(public_path($imageName));
        }
    }
}
